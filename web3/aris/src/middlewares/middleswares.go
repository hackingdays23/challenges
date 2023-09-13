package middlewares

import (
	"net/http"
	"src/utils/token"

	"github.com/gin-gonic/gin"
)

func JwtAuthMiddleware() gin.HandlerFunc {
	return func(g *gin.Context) {
		err := token.TokenIsValid(g)
		if err != nil {
			g.JSON(http.StatusBadRequest, gin.H{"error": "Unauthorized"})
			g.Abort()
			return
		}
		g.Next()
	}
}
