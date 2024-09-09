<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x3 Table with Confetti, Rotating Button, and Breathing Bubble</title>
    <style>
        table {
            width: 1500px;
            height: 1000px;
            border-collapse: collapse;
            margin: 0 auto; 
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            font-size: 24px;
            position: relative; 
        }

        td, th {
            width: 500px;
            height: 333px;
        }

        body {
            background-color: gray; 
            margin: 0;
            overflow: hidden; 
            perspective: 1000px; 
        }

        .red-block {
            width: 300px;
            height: 300px; 
            background-color: #821F0A; 
            margin: 0 auto; 
            background-size: cover; 
        }

        .red-block:hover {
            background-image: url('vtdt.jpg'); 
            background-color: transparent; 
        }

        .confetti-container {
            position: relative; 
            width: 100%; 
            height: 100%; 
            overflow: hidden; 
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f39c12;
            border-radius: 50%;
            opacity: 0;
            animation: fall 3s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px);
                opacity: 1;
            }
            100% {
                transform: translateY(100%);
                opacity: 0;
            }
        }

        .rotate-button {
            display: block;
            width: 150px;
            height: 50px;
            margin: 20px auto;
            background-color: #3498db;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 1s;
        }

        .rotate-button.rotate {
            transform: rotateY(360deg);
        }

        .page-wrapper {
            transition: transform 1s;
        }

        .page-wrapper.rotate {
            transform: rotateY(360deg);
        }

        .bubble-container {
            position: relative;
            width: 100%;
            height: 333px; /* Высота, чтобы пузырь поместился */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* Чтобы пузырь не выходил за границы */
        }

        .bubble {
            width: 100px;
            height: 100px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: breathe 6s ease-in-out infinite;
        }

        @keyframes breathe {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.5);
                opacity: 0.2;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <table>
            <tr>
                <th><div class="red-block"></div></th>
                <th>
                    <div class="confetti-container" id="confetti-container"></div>
                </th>
                <th><button class="rotate-button" id="rotateButton">Click for surprise</button></th>
            </tr>
            <tr>
                <td><div class="bubble-container">
                <div class="bubble"></div>
                </div></td>
                <td>5</td>
                <td>6</td>
            </tr>
            <tr>
                <td>7</td>
                <td>8</td>
                <td>

                </td>
            </tr>
        </table>
    </div>

    <script>
        function createConfetti() {
            const colors = ['#f39c12', '#e74c3c', '#2ecc71', '#3498db', '#9b59b6', '#f1c40f'];
            const container = document.getElementById('confetti-container');

            function addConfetti() {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.width = `${Math.random() * 10 + 10}px`;
                confetti.style.height = confetti.style.width;
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.top = `${Math.random() * 100}vh`; 
                confetti.style.left = `${Math.random() * 100}vw`;
                container.appendChild(confetti);
            }

            setInterval(addConfetti, 10);
        }

        function rotatePage() {
            const pageWrapper = document.querySelector('.page-wrapper');
            pageWrapper.classList.toggle('rotate'); 
        }

        document.getElementById('rotateButton').addEventListener('click', rotatePage);

        createConfetti();
    </script>
</body>
</html>
