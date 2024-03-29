import inspect
from typing import Any


class AOC2021:
    @staticmethod
    def file_open(*, day: int, split: str = None, to_type: Any = None) -> str:
        with open(f"./input_day_{day}.txt", "r+") as inp:
            data = inp.read().split(split) if split else inp.read()
            return (
                (list(map(to_type, data)) if isinstance(data, list) else to_type(data))
                if to_type
                else data
            )

    @staticmethod
    def fmt_solution(output: tuple[int, int]) -> str:
        return f"part 1: {output[0]}, part 2: {output[1]}"

    def solve_all(self) -> None:
        for name, func in filter(
            lambda x: "day" in x[0],
            inspect.getmembers(self, predicate=inspect.ismethod),
        ):
            print(f"Executing {name}, {func()}")

    def day1(self) -> str:
        """
        --- Day 1: Sonar Sweep ---

        You're minding your own business on a ship at sea when the overboard alarm goes off!
        You rush to see if you can help. Apparently, one of the Elves tripped and accidentally sent the
        sleigh keys flying into the ocean!

        Before you know it, you're inside a submarine the Elves keep
        ready for situations like this. It's covered in Christmas lights (because of course it is), and it
        even has an experimental antenna that should be able to track the keys if you can boost its signal
        strength high enough; there's a little meter that indicates the antenna's signal strength by
        displaying 0-50 stars.

        Your instincts tell you that in order to save Christmas, you'll need to get all fifty stars by December 25th.

        Collect stars by solving puzzles. Two puzzles will be made available on each day in the Advent calendar;
        the second puzzle is unlocked when you complete the first. Each puzzle grants one star. Good luck!

        As the submarine drops below the surface of the ocean, it automatically performs a sonar sweep of the
        nearby sea floor. On a small screen, the sonar sweep report (your puzzle input) appears: each line is a
        measurement of the sea floor depth as the sweep looks further and further away from the submarine.

        For example, suppose you had the following report:
        199
        200
        208
        210
        200
        207
        240
        269
        260
        263

        This report indicates that, scanning outward from the submarine,
        the sonar sweep found depths of 199, 200, 208, 210, and so on.

        The first order of business is to figure out how quickly the depth increases, just so you
        know what you're dealing with - you never know if the keys will get carried into deeper water by
        an ocean current or a fish or something.

        To do this, count the number of times a depth measurement increases from the
        previous measurement. (There is no measurement before the first measurement.)
        In the example above, the changes are as follows:

        199 (N/A - no previous measurement)
        200 (increased)
        208 (increased)
        210 (increased)
        200 (decreased)
        207 (increased)
        240 (increased)
        269 (increased)
        260 (decreased)
        263 (increased)

        In this example, there are 7 measurements that are larger than the previous measurement.
        How many measurements are larger than the previous measurement?

        Your puzzle answer was 1195.

        --- Part Two ---
        Considering every single measurement isn't as useful as you expected: there's just too much noise in the data.

        Instead, consider sums of a three-measurement sliding window. Again considering the above example:

        199  A
        200  A B
        208  A B C
        210    B C D
        200  E   C D
        207  E F   D
        240  E F G
        269    F G H
        260      G H
        263        H

        Start by comparing the first and second three-measurement windows. The measurements in the first window
        are marked A (199, 200, 208); their sum is 199 + 200 + 208 = 607. The second window is marked B (200, 208, 210);
        its sum is 618. The sum of measurements in the second window is larger than the sum of the first,
        so this first comparison increased.

        Your goal now is to count the number of times the sum of measurements in this sliding window
        increases from the previous sum. So, compare A with B, then compare B with C, then C with D, and so on.
        Stop when there aren't enough measurements left to create a new three-measurement sum.

        In the above example, the sum of each three-measurement window is as follows:

        A: 607 (N/A - no previous sum)
        B: 618 (increased)
        C: 618 (no change)
        D: 617 (decreased)
        E: 647 (increased)
        F: 716 (increased)
        G: 769 (increased)
        H: 792 (increased)

        In this example, there are 5 sums that are larger than the previous sum.
        Consider sums of a three-measurement sliding window. How many sums are larger than the previous sum?

        Your puzzle answer was 1235.
        """

        inp = self.file_open(day=1, split="\n", to_type=int)
        part1_count = 0
        part2_count = 0

        prev = -1
        prev_csum = -1

        for i, measure in enumerate(inp):
            if prev < measure and i:
                part1_count += 1

            try:
                csum = measure + inp[i + 1] + inp[i + 2]
                if prev_csum < csum and i:
                    part2_count += 1
            except IndexError:
                pass

            prev = measure
            prev_csum = csum

        return self.fmt_solution((part1_count, part2_count))

    def day2(self) -> str:
        """
        --- Day 2: Dive! ---
        Now, you need to figure out how to pilot this thing.

        It seems like the submarine can take a series of commands like forward 1, down 2, or up 3:

        forward X increases the horizontal position by X units.
        down X increases the depth by X units.
        up X decreases the depth by X units.
        Note that since you're on a submarine, down and up affect your depth,
        and so they have the opposite result of what you might expect.

        The submarine seems to already have a planned course (your puzzle input).
        You should probably figure out where it's going. For example:

        forward 5
        down 5
        forward 8
        up 3
        down 8
        forward 2
        Your horizontal position and depth both start at 0. The steps above would then modify them as follows:

        forward 5 adds 5 to your horizontal position, a total of 5.
        down 5 adds 5 to your depth, resulting in a value of 5.
        forward 8 adds 8 to your horizontal position, a total of 13.
        up 3 decreases your depth by 3, resulting in a value of 2.
        down 8 adds 8 to your depth, resulting in a value of 10.
        forward 2 adds 2 to your horizontal position, a total of 15.

        After following these instructions, you would have a horizontal position of 15
        and a depth of 10. (Multiplying these together produces 150.)

        Calculate the horizontal position and depth you would have after following the planned course.
        What do you get if you multiply your final horizontal position by your final depth?

        Your puzzle answer was 1693300.

        --- Part Two ---
        Based on your calculations, the planned course doesn't seem to make any sense.
        You find the submarine manual and discover that the process is actually slightly more complicated.

        In addition to horizontal position and depth, you'll also need to track a third value, aim,
        which also starts at 0. The commands also mean something entirely different than you first thought:

        down X increases your aim by X units.
        up X decreases your aim by X units.
        forward X does two things:
        It increases your horizontal position by X units.
        It increases your depth by your aim multiplied by X.

        Again note that since you're on a submarine, down and up do the opposite of what you might expect:
        "down" means aiming in the positive direction.

        Now, the above example does something different:

        forward 5 adds 5 to your horizontal position, a total of 5. Because your aim is 0, your depth does not change.
        down 5 adds 5 to your aim, resulting in a value of 5.
        forward 8 adds 8 to your horizontal position, a total of 13. Because your aim is 5, your depth increases by 8*5=40.
        up 3 decreases your aim by 3, resulting in a value of 2.
        down 8 adds 8 to your aim, resulting in a value of 10.
        forward 2 adds 2 to your horizontal position, a total of 15.

        Because your aim is 10, your depth increases by 2*10=20 to a total of 60.
        After following these new instructions, you would have a horizontal position of
        15 and a depth of 60. (Multiplying these produces 900.)

        Using this new interpretation of the commands, calculate the horizontal position and depth you would
        have after following the planned course. What do you get if you multiply your final horizontal
        position by your final depth?

        Your puzzle answer was 1857958050.
        """

        x, y, y2 = (0, 0, 0)

        for instruction in self.file_open(day=2, split="\n"):
            direction, amount = instruction.split(" ")
            amount = int(amount)

            match direction:
                case "forward":
                    x += amount
                    y2 += y * amount
                case "down":
                    y += amount
                case "up":
                    y -= amount

        return self.fmt_solution((x * y, x * y2))

    def day3(self) -> str:
        """
        --- Day 3: Binary Diagnostic ---
        The submarine has been making some odd creaking noises, so you ask
        it to produce a diagnostic report just in case.

        The diagnostic report (your puzzle input) consists of a list of binary numbers which, when decoded properly,
        can tell you many useful things about the conditions of the submarine.
        The first parameter to check is the power consumption.

        You need to use the binary numbers in the diagnostic report to generate two new binary numbers
        (called the gamma rate and the epsilon rate). The power consumption can then be
        found by multiplying the gamma rate by the epsilon rate.

        Each bit in the gamma rate can be determined by finding the most common bit in
        the corresponding position of all numbers in the diagnostic report.
        For example, given the following diagnostic report:
        00100
        11110
        10110
        10111
        10101
        01111
        00111
        11100
        10000
        11001
        00010
        01010

        Considering only the first bit of each number, there are five 0 bits and seven 1 bits.
        Since the most common bit is 1, the first bit of the gamma rate is 1.

        The most common second bit of the numbers in the diagnostic report is 0,
        so the second bit of the gamma rate is 0.

        The most common value of the third, fourth, and fifth bits are 1, 1,
        and 0, respectively, and so the final three bits of the gamma rate are 110.

        So, the gamma rate is the binary number 10110, or 22 in decimal.

        The epsilon rate is calculated in a similar way; rather than use the most common bit,
        the least common bit from each position is used. So, the epsilon rate is 01001, or 9 in decimal.
        Multiplying the gamma rate (22) by the epsilon rate (9) produces the power consumption, 198.

        Use the binary numbers in your diagnostic report to calculate the gamma rate and epsilon rate,
        then multiply them together. What is the power consumption of the submarine?
        (Be sure to represent your answer in decimal, not binary.)

        Your puzzle answer was 3958484.

        --- Part Two ---
        Next, you should verify the life support rating, which can be determined by
        multiplying the oxygen generator rating by the CO2 scrubber rating.

        Both the oxygen generator rating and the CO2 scrubber rating are values that can be
        found in your diagnostic report - finding them is the tricky part.
        Both values are located using a similar process that involves filtering out values until only one remains.
        Before searching for either rating value, start with the full list of binary numbers from your diagnostic
        report and consider just the first bit of those numbers. Then:

        Keep only numbers selected by the bit criteria for the type of rating value for which you are searching.
        Discard numbers which do not match the bit criteria.
        If you only have one number left, stop; this is the rating value for which you are searching.
        Otherwise, repeat the process, considering the next bit to the right.
        The bit criteria depends on which type of rating value you want to find:

        To find oxygen generator rating, determine the most common value (0 or 1) in the current bit position,
        and keep only numbers with that bit in that position. If 0 and 1 are equally common,
        keep values with a 1 in the position being considered.
        To find CO2 scrubber rating, determine the least common value (0 or 1) in the current bit position,
        and keep only numbers with that bit in that position. If 0 and 1 are equally common,
        keep values with a 0 in the position being considered.
        For example, to determine the oxygen generator rating value using the same example diagnostic report from above:

        Start with all 12 numbers and consider only the first bit of each number.
        There are more 1 bits (7) than 0 bits (5), so keep only the 7 numbers with a 1 in the
        first position: 11110, 10110, 10111, 10101, 11100, 10000, and 11001.
        Then, consider the second bit of the 7 remaining numbers: there are more 0 bits (4) than 1 bits (3),
        so keep only the 4 numbers with a 0 in the second position: 10110, 10111, 10101, and 10000.
        In the third position, three of the four numbers have a 1, so keep those three: 10110, 10111, and 10101.
        In the fourth position, two of the three numbers have a 1, so keep those two: 10110 and 10111.
        In the fifth position, there are an equal number of 0 bits and 1 bits (one each). So, to find the
        oxygen generator rating, keep the number with a 1 in that position: 10111.
        As there is only one number left, stop; the oxygen generator rating is 10111, or 23 in decimal.
        Then, to determine the CO2 scrubber rating value from the same example above:

        Start again with all 12 numbers and consider only the first bit of each number.
        There are fewer 0 bits (5) than 1 bits (7), so keep only the 5 numbers with a 0 in
        the first position: 00100, 01111, 00111, 00010, and 01010.
        Then, consider the second bit of the 5 remaining numbers: there are fewer 1 bits (2) than 0 bits (3),
        so keep only the 2 numbers with a 1 in the second position: 01111 and 01010.
        In the third position, there are an equal number of 0 bits and 1 bits (one each). So, to find the CO2
        scrubber rating, keep the number with a 0 in that position: 01010.
        As there is only one number left, stop; the CO2 scrubber rating is 01010, or 10 in decimal.
        Finally, to find the life support rating, multiply the oxygen generator rating (23)
        by the CO2 scrubber rating (10) to get 230.

        Use the binary numbers in your diagnostic report to calculate the oxygen generator rating and
        CO2 scrubber rating, then multiply them together. What is the life support rating of the submarine?
        (Be sure to represent your answer in decimal, not binary.)

        Your puzzle answer was 1613181.
        """

        inp = self.file_open(day=3, split="\n")

        N = len(inp[0].strip())

        dat = {i: [x[i] for x in inp] for i in range(N)}
        values = [dat[x].count("0") < dat[x].count("1") for x in dat.keys()]

        gamma = "".join(map(str, map(int, values)))
        epsilon = "".join(map(str, map(int, map(lambda i: not i, values))))

        def filter_data_bitwise(filter_by_most_common: bool = True):
            data = [int(line, 2) for line in inp]
            for bit in reversed([2**n for n in range(N)]):
                rat = sum(1 for num in data if num & bit) / len(data)
                wanted_bit_value = bit * int((rat >= 0.5) == filter_by_most_common)
                data = [x for x in data if x & bit == wanted_bit_value]
                if len(data) == 1:
                    break
            return data

        return self.fmt_solution(
            (
                int(gamma, 2) * int(epsilon, 2),
                filter_data_bitwise()[0]
                * filter_data_bitwise(filter_by_most_common=False)[0],
            )
        )


a = AOC2021()
a.solve_all()
