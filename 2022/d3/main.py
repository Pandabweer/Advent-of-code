print(
    *(
        v := open("inp.txt").read().split("\n"),
        sum(
            (
                (l := len(r) // 2, ord(*(set(r[:l]) & set(r[l:]))) - 96)[1] % 58
                for r in v
            )
        ),
        sum(
            [
                (ord(*(set(x) & set(y) & set(z))) - 96) % 58
                for x, y, z in zip(*3 * [iter(v)])
            ]
        ),
    )[1:]
)
