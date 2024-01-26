#### --- Day 4: The Ideal Stocking Stuffer ---

Santa needs help mining some AdventCoins (very similar to bitcoins) to use as gifts for all the economically forward-thinking little girls and boys.

To do this, he needs to find MD5 hashes which, in hexadecimal, start with at least <span class="indicator">five zeroes</span>. The input to the MD5 hash is some secret key (your puzzle input, given below) followed by a number in decimal. To mine AdventCoins, you must find Santa the lowest positive number (no leading zeroes: `1`, `2`, `3`, ...) that produces such a hash.

For example:

   - If your secret key is `abcdef`, the answer is `609043`, because the MD5 hash of `abcdef609043` starts with five zeroes (`000001dbbfa...`), and it is the lowest such number to do so.
   - If your secret key is `pqrstuv`, the lowest number it combines with to make an MD5 hash starting with five zeroes is `1048970`; that is, the MD5 hash of `pqrstuv1048970` looks like `000006136ef...`.

#### --- Part Two ---

Now find one that starts with <span class="indicator">six zeroes</span>.

<details><summary>CSS for IDE's</summary>

<style>
   body {
      font-family: "Source Code Pro", monospace;
      width: 47em;
      font-weight: 300;
      font-size: 14px;
   }
   span {
      font-weight: bold;
   }
   p {
      color: #ccc;
   }
   .star {
      color: #ffff66;
      text-shadow: 0 0 5px #ffff66;
   }
   .indicator {
      color: white;
      text-shadow: 0 0 5px white;
   }
</style>

Who doesn't like some styling :3
</details>