#include <iostream>
#include <fstream>
#include <sstream>
#include <string>

using namespace std;

std::string getFileContents(const std::string& fileName) {
    std::ifstream file(fileName);

    if (!file.is_open()) {
        throw std::runtime_error("Unable to open file: " + fileName);
    }

    std::stringstream buffer;
    buffer << file.rdbuf();

    file.close();
    return buffer.str();
}

int main(int argc, char *argv[]) {
	std::string fileContents = getFileContents("_input.txt");

	int pos = 0;
	int count = 0;
	bool found = false;

    for (char c : fileContents) {
		if (found == false) {
			if (pos == -1) {
				found = true;
			} else {
				count += 1;
			}
		}

		if (c == '(') {
			pos += 1;
		} else {
			pos -= 1;
		}
    }

	std::cout << "Part 1: " << pos << std::endl << "Part 2: " << count;
	return 0;
}