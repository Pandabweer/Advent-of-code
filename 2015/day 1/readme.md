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

#### --- Day 1: Not Quite Lisp ---
<p>Santa was hoping for a white Christmas, but his weather machine's "snow" function is powered by stars, 
and he's fresh out! To save Christmas, he needs you to collect <span class="star">fifty stars</span> by December 25th.

Collect stars by helping Santa solve puzzles. Two puzzles will be made available on each day in the Advent calendar; 
the second puzzle is unlocked when you complete the first. Each puzzle grants <span class="star">one star</span>. Good luck!

Here's an easy puzzle to warm you up.

Santa is trying to deliver presents in a large apartment building, but he can't find the right floor - the directions he got are a little confusing. 
He starts on the ground floor (floor `0`) and then follows the instructions one character at a time.

An opening parenthesis, `(`, means he should go up one floor, and a closing parenthesis, `)`, means he should go down one floor.

The apartment building is very tall, and the basement is very deep; he will never find the top or bottom floors.

For example:

   - `(())` and `()()` both result in floor `0`.
   - `(((` and `(()(()(` both result in floor `3`.
   - `))(((((` also results in floor `3`.
   - `())` and `))(` both result in floor `-1` (the first basement level).
   - `)))` and `)())())` both result in floor `-3`.

To <span class="indicator">what floor</span> do the instructions take Santa?</p>

#### --- Part Two ---

<p>Now, given the same instructions, find the <span class="indicator">position</span> of the first character that causes him to enter the basement (floor `-1`). 
The first character in the instructions has position `1`, the second character has position `2`, and so on.

For example:

   - `)` causes him to enter the basement at character position `1`.
   - `()())` causes him to enter the basement at character position `5`.

What is the <span class="indicator">position</span> of the character that causes Santa to first enter the basement?</p>

<svg fill="none" viewBox="0 0 600 300" width="600" height="300" xmlns="http://www.w3.org/2000/svg">
  <foreignObject width="100%" height="100%">
    <div xmlns="http://www.w3.org/1999/xhtml">
      <style>
        @keyframes hi  {
            0% { transform: rotate( 0.0deg) }
           10% { transform: rotate(14.0deg) }
           20% { transform: rotate(-8.0deg) }
           30% { transform: rotate(14.0deg) }
           40% { transform: rotate(-4.0deg) }
           50% { transform: rotate(10.0deg) }
           60% { transform: rotate( 0.0deg) }
          100% { transform: rotate( 0.0deg) }
        }

        @keyframes gradient {
          0% {
            background-position: 0% 50%;
          }
          50% {
            background-position: 100% 50%;
          }
          100% {
            background-position: 0% 50%;
          }
        }

        .container {
          background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
          background-size: 400% 400%;
          animation: gradient 15s ease infinite;

          width: 100%;
          height: 300px;

          display: flex;
          justify-content: center;
          align-items: center;
          color: white;

          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        .hi {
          animation: hi 1.5s linear -0.5s infinite;
          display: inline-block;
          transform-origin: 70% 70%;
        }

        @media (prefers-reduced-motion) {
          .container {
            animation: none;
          }

          .hi {
            animation: none;
          }
        }
      </style>

      <div class="container">
        <h1>Hi there, my name is Panda <div class="hi">👋</div></h1>
      </div>
    </div>
  </foreignObject>
</svg>