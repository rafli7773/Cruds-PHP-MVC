// modal trigger
const modal = document.querySelector('.modal');
const modalToggle = () => modal.classList.toggle('show-modal');
const windowToggle = e => {
    if (e.target === modal) modalToggle();
}

document.querySelectorAll('.trigger').forEach(trigger => trigger.addEventListener('click', modalToggle))
document.querySelector('.modal-close').addEventListener('click', modalToggle);
window.addEventListener('click', e => windowToggle(e));

// change modal Ubah

document.querySelectorAll('.edit').forEach(ubah => {
    ubah.addEventListener('click', e => {
        e.preventDefault();
        // ambil id
        const id = ubah.dataset.id;

        // styling
        document.querySelector('h1').innerHTML = "Forms Edit Data";
        document.querySelector('.submit').innerHTML = "Edit";

        // ubah form action
        const form = document.querySelector('.form');
        const action = document.createAttribute('action');
        action.value = `http://localhost/ann/home/edit/${id}`;
        form.setAttributeNode(action);

        // fetch data barang
        fetch(`http://localhost/ann/home/getUbah/${id}`).then(response => response.json()).then(barang => {
            document.querySelector('#barang').value = barang.barang
            document.querySelector('#posisi').value = barang.posisi
            document.querySelector('#id').value = barang.id
        });

    });
})

// change modal Tambah
document.querySelectorAll('.tambah').forEach(tambah => {
    tambah.addEventListener('click', e => {
        e.preventDefault();
        document.querySelector('h1').innerHTML = "Forms Tambah Data";
        document.querySelector('.submit').innerHTML = "Tambah";

        // action form
        const form = document.querySelector('.form');
        const action = document.createAttribute('action');
        action.value = `http://localhost/ann/home/tambah`;
        form.setAttributeNode(action);

        // value
        document.querySelector('#barang').value = '';
        document.querySelector('#posisi').value = '';
    });
})