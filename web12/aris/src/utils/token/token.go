package token

import (
	"fmt"
	"log"
	"src/models"
	"strings"
	"time"

	"github.com/gin-gonic/gin"
	"github.com/golang-jwt/jwt/v5"
)

var SECRET_KEY = []byte("Chu3GthMYE&B25p3")

func GenerateJWT(user models.User) (string, error) {
	claims := jwt.MapClaims{}
	claims["role"] = user.Role
	claims["email"] = user.Email
	claims["exp"] = time.Now().Add(time.Minute * 30).Unix()

	token := jwt.NewWithClaims(jwt.SigningMethodHS256, claims)
	tokenString, err := token.SignedString(SECRET_KEY)
	if err != nil {
		log.Println("Error in JWT generation")
		return "", err
	}
	return tokenString, err
}

func TokenIsValid(g *gin.Context) error {
	tokenString := ExtractToken(g)
	_, err := jwt.Parse(tokenString, func(token *jwt.Token) (interface{}, error) {
		if _, ok := token.Method.(*jwt.SigningMethodHMAC); !ok {
			return nil, fmt.Errorf("Unexpected token header %v", token.Header)
		}
		return []byte(SECRET_KEY), nil
	})
	if err != nil {
		return err
	}
	return nil
}

func ExtractToken(g *gin.Context) string {
	token := g.Query("token")
	if token != "" {
		return token
	}
	bearerToken := g.Request.Header.Get("Authorization")
	if len(strings.Split(bearerToken, " ")) == 2 {
		return strings.Split(bearerToken, " ")[1]
	}
	return ""
}

func ExtractUserRole(g *gin.Context) (string, error) {
	tokenString := ExtractToken(g)
	token, err := jwt.Parse(tokenString, func(token *jwt.Token) (interface{}, error) {
		if _, ok := token.Method.(*jwt.SigningMethodHMAC); !ok {
			return nil, fmt.Errorf("Unexpected token header %v", token.Header)
		}
		return []byte(SECRET_KEY), nil
	})
	if err != nil {
		return "", err
	}

	claims, ok := token.Claims.(jwt.MapClaims)
	if ok && token.Valid {
		role := fmt.Sprint(claims["role"])
		if role == "" {
			errMsg := fmt.Errorf("Empty role")
			return role, errMsg
		}
		return role, nil
	}
	return "", err
}
