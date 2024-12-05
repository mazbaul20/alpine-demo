<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>alpine instation</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
</head>
<body>
    <h1>Advance Javascript</h1>
    <h2>{{ $title }}</h2>

    <div x-data="person">
        <p x-text="name"></p>
        <p x-text="age"></p>
        <p x-text="email"></p>
        <button @click="age=25" class="bg-blue-500 hover:bg-blue-700 text-white">Update</button>
        <hr>
        <input type="text" x-model="name" id=""><br>
        <input type="text" x-model="age" id=""><br>
        <input type="text" x-model="email" id=""><br>
    </div>

    <div>
        name:<p x-text="name"></p>
    </div>

    <script>
        const person = {
            name:'John Doe',
            age:'32',
            email:'john@doe.com',
        }

        const data = {
            name:'',
            price:'',
            quentity:'',

            getData(){
                let res = axios.get('products');
                console.log(res);
                this.name= res.name
            }
        }
    </script>
</body>
</html>
