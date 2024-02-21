data = open("_input.txt").read()
help_dict = {
    "one": "1",
    "two": "2",
    "three": "3",
    "four": "4",
    "five": "5",
    "six": "6",
    "seven": "7",
    "eight": "8",
    "nine": "9",
}


def matchfl(inp):
    return sum(
        map(
            lambda x: int(f"{x[0]}{x[-1]}"),
            [list(filter(lambda i: i.isdigit(), x)) for x in inp],
        )
    )


l = []

for word in data.split("\n"):
    match = ""
    indmatch = 0
    for i, letter in enumerate(word):
        if letter.isdigit():
            match += letter
        for nword, number in help_dict.items():
            if nword in word[indmatch : i + 1]:
                match += str(number)
                indmatch = i
                break
    l.append(match)

print(matchfl(data.split("\n")), matchfl(l))
