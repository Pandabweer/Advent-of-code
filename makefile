py:
	python $(target)

php:
	php $(target)

c:
	clang $(target) -o main
	./main
	rm -rf ./main

cpp:
	clang++ $(target) -std=c++20 -o main
	./main
	rm -rf ./main