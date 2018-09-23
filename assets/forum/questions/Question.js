let ans = {};

function Question(data, count) {
    this.inst = document.createElement('div');
    this.inst.setAttribute('class', 'card');

    this.header = document.createElement('div');
    this.header.setAttribute('class', 'card-header');

    let p = document.createElement('p');
    p.innerText = 'Q. ' + count + ')';


    this.question = document.createElement('p');
    this.question.innerText = data.question;


    this.header.appendChild(p);
    this.header.appendChild(this.question);

    this.inst.appendChild(this.header);

    this.body = document.createElement('div');
    this.body.setAttribute('class', 'card-body');

    this.inst.appendChild(this.body);


    if (data.view === 'grid') {

        let row = '';

        for (let op in data.options) {
            // this.options[op] = data.options[op];

            let check = new Check(data, op);
            let col = new Col();
            col.inst.appendChild(check.inst);

            if (op % 2 === 0) {
                row = new Row();
                row.inst.appendChild(col.inst);
                this.body.appendChild(row.inst);
            } else {
                row.inst.appendChild(col.inst);
            }
        }
        let hr = document.createElement('hr');
        this.body.appendChild(hr);

    } else {
        for (let op in data.options) {
            // this.options[op] = data.options[op];

            let check = new Check(data, op);
            this.body.appendChild(check.inst);
        }
        let hr = document.createElement('hr');
        this.body.appendChild(hr);
    }

    if (data.hint !== undefined) {
        this.quote = new Quote(data.hint);
        this.body.appendChild(this.quote.inst);
    }

}


function Row() {
    this.inst = document.createElement('div');
    this.inst.setAttribute('class', 'form-row');
}


function Col() {
    this.inst = document.createElement('div');
    this.inst.setAttribute('class', 'col');
}


function Check(data, option) {
    this.inst = document.createElement('div');
    this.inst.setAttribute('class', 'form-check');

    this.input = document.createElement('input');

    this.lable = document.createElement('label');
    this.lable.setAttribute('class', 'form-check-label');
    this.lable.setAttribute('for', data.id + '-' + option);
    this.lable.innerText = data.options[option];

    this.input.setAttribute('class', 'form-check-input');
    this.input.setAttribute('type', 'radio');
    this.input.setAttribute('name', 'exampleRadios');
    this.input.setAttribute('id', data.id + '-' + option);
    this.input.setAttribute('valve', data.id + '-' + option);
    this.input.onclick = () => {
        get_click(data, option);
        // console.log(ans);
    }


    this.inst.appendChild(this.input);
    this.inst.appendChild(this.lable);
}

function get_click(data, option) {
    ans[data.id] = option;
}


function Quote(str) {
    this.inst = document.createElement('blockquote');
    this.inst.setAttribute('class', 'blockquote mb-0');
    let footer = document.createElement('footer');
    footer.setAttribute('class', 'blockquote-footer');
    footer.innerText = 'Hint: ';
    let city = document.createElement('city');
    city.setAttribute('title', 'Source Title');
    city.innerText = str;

    this.inst.appendChild(footer);
    footer.appendChild(city);
}


function SubmitButton() {
    this.inst = document.createElement('div');
    this.inst.setAttribute('class', 'container-fluid');
    this.inst.setAttribute('id', 'bottom');

    let row = document.createElement('div');
    let col = document.createElement('div');

    row.setAttribute('class', 'row');
    col.setAttribute('class', 'col');

    let col1 = document.createElement('div');

    col1.setAttribute('class', 'col');
    row.appendChild(col);
    row.appendChild(col1);

    let b = document.createElement('button');
    b.setAttribute('type', 'text');
    b.setAttribute('class', 'btn btn-outline-primary float-right');

    col1.appendChild(b);

    b.innerText = 'Submit';

    b.onclick = () => {
        let final = {
            quiz_id:quiz_id,
            answers:ans
        }

        console.log(final);
    }

    this.inst.appendChild(row);
}









