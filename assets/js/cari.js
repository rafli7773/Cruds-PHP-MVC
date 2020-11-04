// if (!document.querySelector("#keyword").addEventListener('keyup', e => {
//     const keyword = e.target.value;
//     fetch(`http://localhost/ann/home/cari/${keyword}`).then(res => res.text()).then(c => {
//         document.querySelector('.container').innerHTML = c;
//         modalEdit();
//     })
// })) {
//     const keyword = document.querySelector('#keyword').getAttribute('value');
//     console.log(keyword);
//     fetch(`http://localhost/ann/home/cari/${keyword}`).then(res => res.text()).then(c => {
//         document.querySelector('.container').innerHTML = c;
//         modalEdit();
//     })
// }






const modalEdit = () => {
    document.querySelectorAll('.edit').forEach(ubah => {
        ubah.addEventListener('click', e => {
            e.preventDefault();
            const modal = document.querySelector('.modal');
            modal.classList.toggle('show-modal');

            // ambil id
            const id = ubah.dataset.id;

            // styling
            document.querySelector('h1').innerHTML = "Forms Edit Data";
            document.querySelector('.submit').innerHTML = "Edit";

            // ubah form action
            const form = document.querySelector('form');
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
}
