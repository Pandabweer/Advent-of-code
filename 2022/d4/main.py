print(
    *(
        v := [eval(d.replace(*"-,")) for d in open("inp.txt")],
        sum(
            map(
                lambda x: x[0] <= x[2]
                and x[1] >= x[3]
                or x[2] <= x[0]
                and x[3] >= x[1],
                v,
            )
        ),
        sum(map(lambda y: y[1] >= y[2] if y[0] < y[2] else y[3] >= y[0], v)),
    )[1:]
)
