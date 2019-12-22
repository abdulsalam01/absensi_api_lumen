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
      //get token from login
      token: [, '?token='],
    },
    methods: {
      _sendMail: function(req, dataReq) {
        let email = dataReq.detail.users.email_orangtua;

        axios.post('{{ url(env("prefix")) }}/' + req + "/sendView", {
          'email': email,
          'data': dataReq
        }).then((response) => {
          console.log(response.data)
        }).catch((error) => {
          console.log(error)
        })
      },

      _deleteFunc: function(id, req) {
        let url = `/remove/${id}`

        // check if the id is array
        if(Array.isArray(id)) url = `/remove/${id[0]}/${id[1]}`

        axios.delete('{{ url(env("prefix")) }}/' + req + url).then((response) => {
          this.token[0] = sessionStorage.getItem('token');
          //
          window.location.href = '{{ url(app("request")->segment(1)) }}/' + req + '{{"/all"}}' +
                                    this.token[1] + this.token[0]
        })
      },

      _updateFunc: function(id, req, model) {
        let url = `/modify/${id}`

        // check if the id is array
        if(Array.isArray(id)) url = `/modify/${id[0]}/${id[1]}`

        axios.put('{{ url(env("prefix")) }}/' + req + url, model).then((response) => {
          this.token[0] = sessionStorage.getItem('token');
          //
          window.location.href = '{{ url(app("request")->segment(1)) }}/' + req + '{{"/all"}}' +
                                    this.token[1] + this.token[0]
        })
      },

      _insertFunc: function(req, data) {
        axios.post('{{ url(env("prefix")) }}/' + req + '/create', data).then((response) => {
          this.token[0] = sessionStorage.getItem('token');
          //
          window.location.href = '{{ url(app("request")->segment(1)) }}/' + req + '{{"/all"}}' +
                                    this.token[1] + this.token[0]
        })
      },

      _showFunc: function(code, idx, id) {
        // show modals
        $(`#${code}`).modal()
        //
        this.result = this.all_data[idx][id];
      },

      _doAuth: function(username, password) {
        //grab user's input
        let data = {
          'email': username,
          'password': password,
        }

        axios.post('{{ url("auth/login/action") }}', data).then((response) => {
          let code = response.data.result.token;

          //set to state variable token
          this.token[0] = code;
          //set to session
          sessionStorage.setItem('token', this.token[0]);
          //
          //change page with token
          window.location.href = `{{ url("admin?token=") }}${this.token[0]}`
        }).catch((err) => {
          console.log(err)
        })
      },

      _doLogout: function() {
        //clear session
        sessionStorage.removeItem('token')
        //change page
        window.location.href = "{{ url('auth/logout/')}}"
      },
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

  //jQuery
  //route navigation
  $('.collapse-item').on('click', function(e) {
    //get menu
    let menu = $(this).data('url')
    //tokenize
    let token = sessionStorage.getItem('token')
    //
    window.location.href = menu + app.token[1] + token;
  })
</script>
