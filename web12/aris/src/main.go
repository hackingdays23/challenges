package main

import (
	"context"
	"time"

	controllers "src/controllers"
	"src/middlewares"

	_ "src/docs"

	"github.com/gin-gonic/gin"
	swaggerfiles "github.com/swaggo/files"
	ginSwagger "github.com/swaggo/gin-swagger"
	"go.mongodb.org/mongo-driver/mongo"
	"go.mongodb.org/mongo-driver/mongo/options"
)

//	@title		API Hacking
//	@version	1.0

//	@host		localhost:3000
//	@BasePath	/api

var client *mongo.Client

func main() {
	r := gin.Default()

	ctx, _ := context.WithTimeout(context.Background(), 10*time.Second)
	client, _ = mongo.Connect(ctx, options.Client().ApplyURI("mongodb://mongo:27017"))

	userController := controllers.ClientController{Client: client}

	r.GET("/ping", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"message": "pong",
		})
	})

	apiRoutes := r.Group("/api")
	{
		user := apiRoutes.Group("/user")
		{
			user.POST("signup", userController.UserSignup)
			user.POST("login", userController.UserLogin)
		}

		flag := apiRoutes.Group("/flag")
		{
			flag.Use(middlewares.JwtAuthMiddleware())
			flag.GET("/", controllers.GetFlag)
		}
	}
	r.GET("swagger/*any", ginSwagger.WrapHandler(swaggerfiles.Handler))
	r.Run(":3000")
}
