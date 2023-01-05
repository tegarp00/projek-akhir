document.addEventListener('alpine:init', () => {
    Alpine.data('dropdown', () => ({
        coba: "tes1"
    }))

    Alpine.data('regis', () => ({
        users: [],
        test: "sadad",
        user: {
            name: '',
            email: '',
            password: '',
            tanggal_lahir: '',
            noTelephone: 0,
            alamat: ''
        },
        async addUser() {
            const formData = new FormData();
            formData.append('name', this.user.name)
            formData.append('email', this.user.email)
            formData.append('password', this.user.password)
            formData.append('tanggal_lahir', this.user.tanggal_lahir)
            formData.append('no_telephone', this.user.noTelephone)
            formData.append('alamat', this.user.alamat)

            await fetch('https://winter-night-241.fly.dev/api/register', {
                method: 'POST',
                body: formData
            })

            return window.location.replace('https://fenyaperpus.fly.dev')

        },
    }));

    Alpine.store('app', {
        loading: false,
        selectedKategori: 0,
        selectedImage: null,
        form: {
            id_kategori: 0,
            judul: '',
            jumlah_halaman: 0,
            kuota: 0,
            file: '',
            pengarang: '',
            penerbit: '',
            deskripsi: '',
            tahun_terbit: '',
            author: '',
            isbn: '',
            image: '',
        },
        // selectFile(event) {
        //     this.form.image = event.target.files
        //     this.form.file = event.target.files
        // },
        submitData(token) {
            // return console.log(document.getElementById('inputFile').value)
            //Create an instance of FormData
            this.form.file = document.getElementById('inputFile').files[0]
            this.form.image = document.getElementById('inputImage').files[0]
            const data = new FormData()
            // let url = '/application '
            
            // Append the form object data by mapping through them
            Object.keys(this.form).map((key, index) => {
                if(key == 'id_kategori') {
                    data.append(key, this.selectedKategori)
                }else {
                    data.append(key, this.form[key])
                }
            });

            this.loading = true
            
            fetch('https://winter-night-241.fly.dev/api/buku', {
                    method: 'POST',
                    headers: {
                        'Authorization': token
                        // 'Accept': 'application/json',
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: data
                })
                .then(response => {
                })
                .finally(() => {
                    this.loading = false
                });

                return window.location.replace('https://fenyaperpus.fly.dev/addbook')

            }
        })

        Alpine.data('kategori', () => ({
            data: [],
        async kategoris(token) {
            let kategori = await fetch('https://winter-night-241.fly.dev/api/kategori', {
                method: 'get',
                headers: {
                    'Authorization': `${token}`
                },
            })
            let hasil = await kategori.json()
            this.data = hasil.data
            }
        }));

    Alpine.store('addCategori', {
        loading: false,
        form: {
            nama_kategori: ''
        },
        submitData(token) {
            const data = new FormData()
            Object.keys(this.form).map((key, index) => {
                data.append(key, this.form[key])
            });

            this.loading = true
            
            fetch('https://winter-night-241.fly.dev/api/kategori', {
                    method: 'POST',
                    headers: {
                        'Authorization': token
                        // 'Accept': 'application/json',
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: data
                })
                .then(response => {
                })
                .finally(() => {
                    this.loading = false
                });

                return window.location.replace('https://fenyaperpus.fly.dev/addcategori')

            }
        })

        Alpine.data('laporan', () => ({
            data: [],
            laporan: [],
        async laporans(token) {
            let kategori = await fetch('https://winter-night-241.fly.dev/api/laporan', {
                method: 'get',
                headers: {
                    'Authorization': `${token}`
                },
            })
            let hasil = await kategori.json()
            this.data = hasil.data
            },

        async countslaporan(token) {
            let kategori = await fetch('https://winter-night-241.fly.dev/api/countlaporan', {
                method: 'get',
                headers: {
                    'Authorization': `${token}`
                },
            })
            let hasil = await kategori.json()
            this.laporan = hasil.data
            }
        }));


        Alpine.data('books', () => ({
            data: [],
        async books(token) {
            let kategori = await fetch('https://winter-night-241.fly.dev/api/books', {
                method: 'get',
                headers: {
                    'Authorization': `${token}`
                },
            })
            let hasil = await kategori.json()
            this.data = hasil.data
            }
        }));

        Alpine.data('buku', () => ({
            data: [],
        async buku(token) {
            let kategori = await fetch('https://winter-night-241.fly.dev/api/databuku', {
                method: 'get',
                headers: {
                    'Authorization': `${token}`
                },
            })
            let hasil = await kategori.json()
            this.data = hasil.data
            }
        }));

        Alpine.data('users', () => ({
            data: [],
        async users(token) {
            let kategori = await fetch('https://winter-night-241.fly.dev/api/users', {
                method: 'get',
                headers: {
                    'Authorization': `${token}`
                },
            })
            let hasil = await kategori.json()
            this.data = hasil.data
            }
        }));

    Alpine.store('pinjam', {
        status: false,
        form: {
            id_user: '',
            id_buku: '',
        },
        submitPinjam(token, id_buku) {
            const data = new FormData()
            this.form.id_buku = id_buku;
            Object.keys(this.form).map((key, index) => {
                data.append(key, this.form[key])
            });

            // this.loading = true
            
            fetch('https://winter-night-241.fly.dev/api/peminjaman', {
                    method: 'POST',
                    headers: {
                        'Authorization': token
                        // 'Accept': 'application/json',
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: data
                })
                .then(response => {
                    // this.status = false
                })
                .finally(() => {
                    // this.status = true
                });

                // return window.location.replace('http://localhost:8001/dashboard/user')

            }
        })

    Alpine.data('pinjam', () => ({
        statusPinjam: [],
        setClick: false,
        status: false,
        form: {
            id_user: '',
            id_buku: '',
        },
        async submitPinjam(token, id_buku) {
            const data = new FormData()
            this.form.id_buku = id_buku;
            Object.keys(this.form).map((key, index) => {
                data.append(key, this.form[key])
            });

            // this.loading = true
            
            let pjm = await fetch('https://winter-night-241.fly.dev/api/peminjaman', {
                    method: 'POST',
                    headers: {
                        'Authorization': token
                        // 'Accept': 'application/json',
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: data
                })

            let hasil = await pjm.json()
            // console.log(hasil.data.statusPinjam)
                this.statusPinjam = hasil.data
                this.status = true

                window.location.href='https://winter-night-241.fly.dev/dashboard/user'

            },

        simpanLocal(id_buku) {
            this.form.id_buku = id_buku

            localStorage.setItem(`stop-click/${id_buku}`, true)
            // if (buttonClicked) {
            //   window.Alpine.set({ clicked: true });
            // }
            // this.getClick = localStorage.getItem('button-clicked')
        },

        statusPinjam(id_buku) {
            if(this.form.id_buku == id_buku) {
                this.status = true
            }
        }
        
    }))
})