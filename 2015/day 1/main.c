#include <stdio.h>
#include <stdbool.h>

int main() {
    FILE *fptr = fopen("_input.txt", "r");

    int ch;
    bool found = false;

    int pos = 0;
    int count = 0;

    do {
        ch = fgetc(fptr);
        if (ch == EOF) {
            break;
        }

        if (found == false) {
            if (pos == -1) {
                found = true;
            } else {
                count += 1;
            }
        }

        if (ch == '(') {
            pos += 1;
        } else {
            pos -= 1;
        }
    } while (true);

    printf("Part 1: %d \nPart 2: %d", pos, count);
    fclose(fptr);

    return 0;
}