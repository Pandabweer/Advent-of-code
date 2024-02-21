print(
    *(
        v := sorted(
            map(
                lambda s: sum(s),
                map(lambda x: map(int, x.split("\n")), open("inp.txt").split("\n\n")),
            )
        ),
        v[-1],
        sum(v[-3:]),
    )[1:]
)
