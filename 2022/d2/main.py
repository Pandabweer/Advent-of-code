print(
    *(
        sum(x[line[0]][line[2]] for line in open("inp.txt").read().splitlines())
        for x in (
            {
                "A": {"X": 4, "Y": 8, "Z": 3},
                "B": {"X": 1, "Y": 5, "Z": 9},
                "C": {"X": 7, "Y": 2, "Z": 6},
            },
            {
                "A": {"X": 3, "Y": 4, "Z": 8},
                "B": {"X": 1, "Y": 5, "Z": 9},
                "C": {"X": 2, "Y": 6, "Z": 7},
            },
        )
    )
)
