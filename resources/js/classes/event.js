export default class Event {
    constructor(params = {title, description, begin, end, token}) {
        this.title = params.title;
        this.description = params.description;
        this.begin = new Date(params.begin);
        this.end = new Date(params.end);
        this.token = params.token;
    }

    save() {
        axios.post('/api/events', {
            title: this.title,
            description: this.description,
            begin: this.begin,
            end: this.end,
        }, {
            headers: {
                'Authorization': 'Bearer ' + this.token
            }
        })
        .then((response) => {
            success(response);
        })
        .catch(response => {
            error(response);
        });
    }
}