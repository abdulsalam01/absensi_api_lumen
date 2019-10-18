<script type="text/javascript">
  // api
  const API = ['mahasiswa', 'mata_kuliah', 'detil_jadwal', 'rekap_kehadiran'];
  //
  let app = new Vue({
    el: '#app',
    data: {
        counter: [],
        all_data: []
    },
    mounted () {
      for (let i = 0; i < API.length; i++) {
        axios.get('{{ url(env("prefix")) }}/' + API[i] + '{{ "/count" }}')
             .then(response => Vue.set(this.counter, i, response.data))

        axios.get('{{ url(env("prefix")) }}/' + API[i] + '{{ "/all" }}')
             .then(response => Vue.set(this.all_data, i, response.data))
      }
    }
  })
</script>
