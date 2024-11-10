// var namaVariabel;
// let namaVariabel; let harus memiliki nilai
// const namaVariabel; nilaiconst tidak bisa berubah
let addRow = document.getElementById("add-row");
addRow.addEventListener("click", function () {
  let tabel = document.getElementById("table").getElementsByTagName("tbody")[0];
  let newRow = table.insertRow(table.rows.length);

  // untuk membuat table row
  let namaBukuCell = newRow.insertCell(0);
  let aksiCell = newRow.insertCell(1);
  let bukuName = document.getElementById("id_buku");

  bukuName = bukuName.options[bukuName.selectedIndex].text;

  let bukuId = document.getElementById("id_buku").value;
  if (bukuId == "") {
    alert("Buku tidak boleh kosong");
    return false;
  }
  namaBukuCell.innerHTML =
    bukuName + "<input type='hidden' name='id_buku[]' value='" + bukuId + "'>";
  aksiCell.innerHTML =
    "<button type='button' onclick='deleteRow(this)' class= 'btn btn-sm btn-danger'>Hapus</button>";
});

function deleteRow(button) {
  let row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

// $("#id_peminjaman").change(function () {
//   alert("Duarrrrrr");
// });
