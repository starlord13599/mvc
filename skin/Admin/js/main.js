const small = document.querySelectorAll('.small');
const thumb = document.querySelectorAll('.thumb')
const base = document.querySelectorAll('.base')

function myFunction() {
    let value = this.value
    for (const s of small) {
        if (s.value == value && s.checked && s != this) {
            s.checked = false
        }
    }
}

for (const s of small) {
    s.addEventListener('click', myFunction)
}


function myFunction1() {
    let value = this.value
    for (const t of thumb) {
        if (t.value == value && t.checked && t != this) {
            t.checked = false
        }
    }
}

for (const t of thumb) {
    t.addEventListener('click', myFunction1)
}


function myFunction2() {
    let value = this.value
    for (const b of base) {
        if (b.value == value && b.checked && b != this) {
            b.checked = false
        }
    }
}

for (const b of base) {
    b.addEventListener('click', myFunction2)
}


const delete_btn = document.getElementById('delete_btn');

delete_btn.addEventListener('click', function (e) {
    e.preventDefault()
    const removes = document.querySelectorAll('.remove')
    ids = []

    for (const r of removes) {
        if (r.checked) {
            ids.push(r.getAttribute('data'))
        }
    }

    jQuery.ajax({
        method: 'POST',
        url: 'http://localhost/Project/?a=delete&c=Admin\\Product\\Media',
        data: {
            'ids': ids
        },
        success: function (response) {
            console.log(response)
            for (const r of removes) {
                if (r.checked) {
                    r.parentElement.parentElement.style.display = 'none';
                }
            }
        }
    })

})