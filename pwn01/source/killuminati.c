#include <stdio.h>
#include <string.h>

int function(){
	
	unsigned char secret[23] = "Xw]PVJWXInP_UnCD_L";
        unsigned char key[100] = "1";
        size_t secretlen = strlen(secret);
        size_t keylen = strlen(key);
        unsigned char crypt[secretlen];
	unsigned char magic[10] = "1";
	char x[] = "XYZABBCCQWERTY2023@";
 	char pass[20];
	int ret;

	printf("My secret:\n");

	scanf("%20s", &pass);

	ret = strcmp(pass, x);

	if (ret == 0){
		
		for(int i = 0; i < secretlen; i++){
		crypt[i] = secret[i] ^ key[i % keylen];	
		}
               	printf("%s", crypt);	
	        
	}
	
	else{
		printf("Wrong\n");
	}

}







int main() {

	puts("OK. You fix the binary =p");
}
