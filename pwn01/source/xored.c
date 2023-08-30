#include <stdio.h>
#include <string.h>

int main() {
	
	unsigned char secret[23] = "Xw]PVJWXInP_UnCD_L";
    	unsigned char key[100] = "1";
	size_t secretlen = strlen(secret);
	size_t keylen = strlen(key);
	unsigned char crypt[secretlen];
	unsigned char decrypt[100];


	for(int i = 0; i < secretlen; i++){

		crypt[i] = secret[i] ^ key[i % keylen];
   		//printf("%X", crypt);

		
		decrypt[i] = secret[i] ^ key[i % keylen];
		//printf("%s", decrypt);
	}


	//printf("%L\n", crypt);

	printf("%s\n", decrypt);




}
