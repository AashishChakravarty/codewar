<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeWar</title>
    <link rel="icon" href="../../../assets/forum/brand/codewar.jpg" type="image/png">
    <meta name="description" content="CodeWar is codeing club helps new programmers to start from.">

    <link rel="stylesheet" href="../../../assets/forum/bootstrap/css/bootstrap.min.css">
    <script rel="script" src="../../../assets/forum/questions/Question.js"></script>

</head>
<body>

<div class="container-fluid bg-light fixed-top" id="navbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">CodeWar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!--<li class="nav-item active">-->
                    <!--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--<a class="nav-link" href="#">Link</a>-->
                    <!--</li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Workshops
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Code-It-In-Python</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Pycon-1.0</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
</div>


<div class="jumbotron jumbotron-fluid" id="top-jumbotron">
    <div class="container">
        <h1 class="display-4" id="contest-name-n-quiz-id">Code It In Python - {Quiz 1}</h1>
        <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
</div>


<div class="container" style="margin-top: 70px;" id="questions">

    <!-- ------------------------------------------------------------- -->

</div>


<style>
    body {
        background-color: #e9ecef;
    }

    #top-jumbotron {
        margin-top: 10px;
    }

    .card {
        border: none;
        margin-bottom: 20px;
    }

    .card-header {
        border-left: 5px solid #f0ad4e;
    }

    #navbar {
        box-shadow: 0px 5px rgba(0, 0, 0, 0.13);
    }

    .form-check {
        margin: 10px;
    }

    /*blockquote {*/
    /*display: none;*/
    /*}*/

    #bottom {
        margin-bottom: 50px;
    }
</style>


<script>
    let urlParams = new URLSearchParams(location.search);

    let qus = document.getElementById('questions');
    let quiz_name = urlParams.get('Quiz-name');
    let quiz_id = urlParams.get('Quiz-id');
    let contest_name_and_quiz = document.getElementById('contest-name-n-quiz-id');
    contest_name_and_quiz.innerText = quiz_name;


    let questions = [
        {
            question: 'Was the lecture easy to understand? ',
            options: ['Agree', 'Satisfactory', 'Disagree'],
            type: 'check',
            // hint: 'do your best!',
            view: 'grid',
            id: 'Q-0'
        },
        {
            question: 'Rate the instructor',
            options: ['Excellent', 'Good', 'Average', 'Fair', 'Poor'],
            type: 'check',
            // hint: 'do your best!',
            view: 'grid',
            id: 'Q-1'
        },
        {
            question: 'Were the course and the instructors interactive? ',
            options: ['Agree', 'Satisfactory', 'Disagree'],
            type: 'check',
            // hint: 'do your best!',
            view: 'grid',
            id: 'Q-2'
        },
        {
            question: 'Were the doubts solved appropriately? ',
            options: ['Agree', 'Satisfactory', 'Disagree'],
            type: 'check',
            // hint: 'do your best!',
            view: 'grid',
            id: 'Q-3'
        },
        {
            question: 'Rate the management. ',
            options: ['Excellent', 'Good', 'Average', 'Fair', 'Poor'],
            type: 'check',
            // hint: 'do your best!',
            view: 'grid',
            id: 'Q-4'
        },
        {
            question: 'Were the computer’s working properly? ',
            options: ['Agree', 'Satisfactory', 'Disagree'],
            type: 'check',
            hint: 'the systems provided to you',
            view: 'grid',
            id: 'Q-5'
        }
    ];


    function loadQuestions() {
        let submitBTN = new SubmitButton()
        let Q

        for (let index in questions) {
            let q = questions[index]
            Q = new Question(q, parseInt(index) + 1)
            qus.appendChild(Q.inst)
        }

        qus.appendChild(submitBTN.inst)

    }

    loadQuestions()


    // function request_for_questions(quiz_id, callback) {
    //     $.get();
    // }

</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
