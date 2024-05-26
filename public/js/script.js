function loadFile(event, id) {
    let image = document.querySelector('#' + id)
    image.src = URL.createObjectURL(event.target.files[0]);
}

function changeStatus(id, model, token, route) {
    fetch(route, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'X-CSRF-Token': token
        },
        body: JSON.stringify({
            id,
            model
        })
    });
}

function addField() {
    const wrapper = document.querySelector('#wrapper')
    let field = document.createElement('div')
    let rand = Math.floor(Math.random() * 1000)
    field.className = 'd-flex'
    field.innerHTML = `
            <div class="d-flex my-1" id="field${rand}">
                <div class="d-flex">
                    <input type="text" name="fields[${rand}][key]" placeholder="KEY" class="form-control">
                    <input type="text" name="fields[${rand}][value]" placeholder="VALUE" class="form-control mx-4">
                </div>

                <div style="width: 50px">
                    <button type="button"
                            class="btn btn-block btn-dark"
                        onclick="removeField('field${rand}')"
                        >
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `
    wrapper.append(field)
}

function removeField(id) {
    document.querySelector(`#${id}`).remove()
}
