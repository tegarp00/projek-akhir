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
            umur: 0,
            noTelephone: 0,
            alamat: ''
        },
        async addUser() {
            const formData = new FormData();
            formData.append('name', this.user.name)
            formData.append('email', this.user.email)
            formData.append('password', this.user.password)
            formData.append('umur', this.user.umur)
            formData.append('no_telephone', this.user.noTelephone)
            formData.append('alamat', this.user.alamat)

            await fetch('http://localhost:8000/api/register', {
                method: 'POST',
                body: formData
            })

            return window.location.replace('http://localhost:8001')

        },
    }));
})