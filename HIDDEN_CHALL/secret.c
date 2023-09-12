#include <stdio.h>
#include <string.h>

int main() {

	char url[] = {'h','t','t','p','s',':','/','/','p','a','s','t','e','b','i','n','.','c','o','m','/','x','8','i','H','9','3','q','1'};
	
	size_t len = strlen(url);

	int i = 0;

	for (i ; i <= len; i++) {

		printf("Letra: %c Posicao: %d\n", url[i], i);

	}


		url[26] = url[28] ;


}
