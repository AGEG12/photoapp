const tableHTML = document.querySelector('.table-html');
const cells = tableHTML.getElementsByTagName('td');

for (i=0;i<cells.length;i++) {
    cells[i].onclick = function() {

        if (this.hasAttribute('data-clicked')) {
            return;
        }

        this.setAttribute('data-clicked', 'yes');
        this.setAttribute('data-text', this.innerHTML);

        const input = document.createElement('INPUT');
        input.setAttribute('type','text');
        input.value = this.innerHTML;
        input.style.width = this.offsetWidth - (this.clientLeft * 2) + "px";
        input.style.height = this.offsetHeight - (this.clientTop * 2) + "px";
        input.style.border = "0px";
        input.style.fontFamily = "inherit";
        input.style.fontSize = "inherit";
        input.style.textAlign = "inherit";

        input.onblur = function() {
            var td = input.parentElement;
            var orig_text = input.parentElement.getAttribute('data-text');
            var current_text = this.value;

            if (orig_text != current_text) {
                 td.removeAttribute('data-clicked');
                 td.removeAttribute('data-text');
                 td.innerHTML = current_text;
            } else {
                td.removeAttribute('data-clicked');
                td.removeAttribute('data-text');
                td.innerHTML = orig_text;
            }
        }
        this.innerHTML = '';
        this.style.cssText = 'padding: 0px 0px';
        this.append(input);
        this.firstElementChild.select();                    
    }
}

const btnTable = document.getElementById('btn-table');
btnTable.addEventListener('click', ()=>{
    const body = document.getElementsByTagName('BODY')[0];
    const tableHTML = document.querySelector('.table-html').innerHTML;

    const formTable = document.createElement('FORM');
    formTable.setAttribute('name','formulario');
    formTable.setAttribute('action','create-excel.php');
    formTable.setAttribute('method','POST');

    const inputTable = document.createElement('INPUT');
    inputTable.setAttribute('type','text');
    inputTable.setAttribute('name','table');
    inputTable.setAttribute('value',tableHTML);

    formTable.appendChild(inputTable);
    body.appendChild(formTable);
    formTable.style.display = 'none';
    document.formulario.submit();
    formulario.remove();
});

