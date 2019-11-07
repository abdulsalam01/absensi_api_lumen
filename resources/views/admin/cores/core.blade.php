<script type="text/javascript">
  // api
  const API = ['mahasiswa', 'mata_kuliah', 'detil_jadwal', 'rekap_kehadiran'];
  //
  let app = new Vue({
    el: '#app',
    data: {
      // get url of all api and turn into model urls
      urls: API,
      // counter of size of data
      counter: [],
      all_data: [],
      // get data for update while selected
      result: { users: {}, detail: { users: {}, matkul: {} }, },
      // status of presence/absence
      status: [],
      // keep value of inserted data
      datas: {},
    },
    methods: {
      _sendMail: function(req, dataReq) {
        let email = dataReq.detail.users.email_orangtua;

        axios.post('{{ url(env("prefix")) }}/' + req + "/sendTemplate", {
          'email': email,
          'data': dataReq
        }).then((response) => {
          console.log(response.data)
        })
      },

      _deleteFunc: function(id, req) {
        let url = `/remove/${id}`

        // check if the id is array
        if(Array.isArray(id)) url = `/remove/${id[0]}/${id[1]}`

        axios.delete('{{ url(env("prefix")) }}/' + req + url).then((response) => {
          window.location.href = '{{ url(app("request")->segment(1)) }}/' + req + '{{"/all"}}'
        })
      },

      _updateFunc: function(id, req, model) {
        let url = `/modify/${id}`

        // check if the id is array
        if(Array.isArray(id)) url = `/modify/${id[0]}/${id[1]}`

        axios.put('{{ url(env("prefix")) }}/' + req + url, model).then((response) => {
          window.location.href = '{{ url(app("request")->segment(1)) }}/' + req + '{{"/all"}}'
        })
      },

      _insertFunc: function(req, data) {
        axios.post('{{ url(env("prefix")) }}/' + req + '/create', data).then((response) => {
          window.location.href = '{{ url(app("request")->segment(1)) }}/' + req + '{{"/all"}}'
        })
      },

      _showFunc: function(code, idx, id) {
        // show modals
        $(`#${code}`).modal()
        //
        this.result = this.all_data[idx][id];
      }
    },
    mounted () {
      //store status from model to status
      this.status = '{!! json_encode($message->status()) !!}'
      this.status = JSON.parse(this.status)

      // get all data and store to all_data property
      for (let i = 0; i < API.length; i++) {
        axios.get('{{ url(env("prefix")) }}/' + API[i] + '{{ "/count" }}')
             .then(response => Vue.set(this.counter, i, response.data))
        //
        axios.get('{{ url(env("prefix")) }}/' + API[i] + '{{ "/all" }}').then((response) => {
          Vue.set(this.all_data, i, response.data)
        })

      }
      // end for
    }
  })
</script>
