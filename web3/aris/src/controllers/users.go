package controllers

import (
	"context"
	"log"
	"src/models"
	"src/utils/token"
	"strings"
	"time"

	"github.com/gin-gonic/gin"
	"go.mongodb.org/mongo-driver/bson"
	"go.mongodb.org/mongo-driver/mongo"
	"golang.org/x/crypto/bcrypt"
)

type ClientController struct {
	Client *mongo.Client
}

// SignupUser godoc
//
//	@Summary	Signup
//	@Acccept	json
//	@Produce	json
//	@Param		models.UserSignup	body	models.UserSignup	true	"Signup form"
//	@Router		/user/signup																																	[post]
func (c *ClientController) UserSignup(g *gin.Context) {
	var user models.User

	if err := g.ShouldBindJSON(&user); err != nil {
		g.JSON(400, gin.H{
			"error":   true,
			"message": "invalid request body",
		})
		return
	}

	if user.Role == "" {
		user.Role = "user"
	}
	user.Role = strings.ToLower(user.Role)
	user.Password = getHash([]byte(user.Password))
	ctx, _ := context.WithTimeout(context.Background(), 10*time.Second)
	collection := c.Client.Database("ifoodeventos-chall-db").Collection("user")

	if err := collection.FindOne(ctx, bson.M{"email": user.Email}).Err(); err != nil {

		_, err := collection.InsertOne(ctx, user)
		if err != nil {
			log.Println(err)
			g.JSON(500, gin.H{
				"message": "Internal Server Error",
			})
			return
		}
		g.JSON(200, gin.H{
			"message": "OK",
		})
		return
	}
	g.JSON(400, gin.H{
		"message": "It was not possible to finish",
	})
}

// LoginUser godoc
//
//	@Summary	Login
//	@Acccept	json
//	@Produce	json
//	@Param		models.UserLogin	body	models.UserLogin	true	"Login form"
//	@Router		/user/login																																					[post]
func (c *ClientController) UserLogin(g *gin.Context) {
	var user models.User
	var dbUser models.User

	if err := g.ShouldBindJSON(&user); err != nil {
		g.JSON(400, gin.H{
			"error":   true,
			"message": "invalid request body",
		})
		return
	}
	ctx, _ := context.WithTimeout(context.Background(), 10*time.Second)
	collection := c.Client.Database("ifoodeventos-chall-db").Collection("user")
	err := collection.FindOne(ctx, bson.M{"email": user.Email}).Decode(&dbUser)

	if err != nil {
		g.JSON(400, gin.H{
			"message": "Internal Server Error",
		})
		return
	}

	userPass := []byte(user.Password)
	dbPass := []byte(dbUser.Password)
	passErr := bcrypt.CompareHashAndPassword(dbPass, userPass)

	if passErr != nil {
		log.Println(passErr)
		g.JSON(400, gin.H{
			"message": "wrong creds",
		})
		return
	}

	jwtToken, err := token.GenerateJWT(dbUser)

	if err != nil {
		g.JSON(500, gin.H{
			"message": "Internal Server Error",
		})
		return
	}
	g.JSON(200, gin.H{
		"token": jwtToken,
	})
}

func getHash(pwd []byte) string {
	hash, err := bcrypt.GenerateFromPassword(pwd, bcrypt.MinCost)
	if err != nil {
		log.Println(err)
	}
	return string(hash)
}
