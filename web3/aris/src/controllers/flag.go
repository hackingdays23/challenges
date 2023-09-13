package controllers

import (
	"net/http"
	"strings"

	"src/utils/token"

	"github.com/gin-gonic/gin"
)

// GetFlag godoc
//
//	@Summary	Flag
//	@Acccept	json
//	@Produce	json
//	@Router		/flag/																				[get]
//	@Param		Authorization	header	string	true	"Bearer token"
func GetFlag(g *gin.Context) {
	role, err := token.ExtractUserRole(g)
	if err != nil {
		g.JSON(http.StatusBadRequest, err)
		return
	}
	if !strings.HasPrefix(role, "admin") {
		g.JSON(http.StatusUnauthorized, gin.H{"message": "unauthorized"})
		return
	}
	g.JSON(200, gin.H{"congratulations": "iFlag{D1d_u_3v3r_trY_n3W_p4R4ms!?}"})
	return
}
