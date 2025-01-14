<template id="genre">
<h1 class="text-3xl text-info text-center my-10 font-mono">Halaman Genre</h1>
<section class="my-3 mx-8" v-show="inputAction">
    <h2 class="text-info text-lg">Tambah Genre</h2>
    <form @submit.prevent="createGenre">
<input 
type="text"
placeholder="Masukan genre"
class="input input-bordered w-full mt-2"
v-model="name">
<div class="flex justify-between gap-4" >
    <div>
    <button class="btn btn-success btn-block mt-3">Tambah</button>
    <button class="btn btn-error btn-block mt-3" @click="closeForm">Kembali</button>
</div>
</div>
    </form>
</section>
<section class="my-3 mx-8" >
        <div className="overflow-x-auto">
            <div class="flex justify-between mt-4">
            <h2 class="text-lg font-bold text-info my-5">Tampil Genre</h2>
            <button class="py-2 px-6 bg-blue-500 text-white rounded" @click="showForm();"> <i class="fa fa-plus"></i> </button>
        </div>
  <table className="table table-zebra">
    <thead>
      <tr class="text-2xl font-serif text-gray-500">
        <th>No</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr className="bg-base-200" v-for="(item, key) in genreData">
        <th>{{ key + 1 }}</th>
        <td>{{ item.name }}</td>
        <td>
            <input type="button" class="btn btn-primary btn-sm" value="Edit"/>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</section >
 </template>
<script setup >
import { apiClient } from '../config/axios';
import { onMounted, ref } from 'vue';

const name = ref ("");
const inputAction = ref (false);
const genreData = ref(null);

const clearInputForm = async () => {
    name.value = "";
}
const showForm = () => {
    inputAction.value = true;
}
const closeForm = () => {
    inputAction.value = false;
}


const fetchGenre = async () => {
  const {data} =  await apiClient.get('/genre');
genreData.value = data.data;

};
const createGenre = async () => {
    const newGenre = await apiClient.post ('/genre', {
        name: name.value
    });
    clearInputForm();

    alert(newGenre.data.message)
    closeForm();

await fetchGenre();
}
onMounted(() => {
    fetchGenre();
});
</script>