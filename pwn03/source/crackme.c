#include <stdio.h>
#include <string.h>


int main(int argc, char** argv) {

    if (argc != 2) {
        printf("Need exactly one argument.\n");
        return -1;
    }

    char* correct = "1Yta4nYa6rSe93cl71QX";

    if (strncmp(argv[1], correct, strlen(correct))) {
        printf("No, %s is not correct.\n", argv[1]);
        return 1;
    } else {
        printf("Yes, %s is correct! The flag is the password entered:\n", argv[1]);
        return 0;
    }

}
