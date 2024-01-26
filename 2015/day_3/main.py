data = open("_input.txt").read()
santa_pos = robo_pos = santa_pos_old = (0, 0)

santa_old_houses = set([santa_pos_old])
santa_houses = set([santa_pos])
robo_houses = set([robo_pos])

directions = {"^": (0, 1), "v": (0, -1), ">": (1, 0), "<": (-1, 0)}

for i, ins in enumerate(data):
    move = directions[ins]
    santa_pos_old = (santa_pos_old[0] + move[0], santa_pos_old[1] + move[1])
    santa_old_houses.add(santa_pos_old)

    if i % 2:
        robo_pos = (robo_pos[0] + move[0], robo_pos[1] + move[1])
        robo_houses.add(robo_pos)
    else:
        santa_pos = (santa_pos[0] + move[0], santa_pos[1] + move[1])
        santa_houses.add(santa_pos)

print(f"Part 1: {len(santa_old_houses)}\nPart 2: {len(santa_houses | robo_houses)}")
