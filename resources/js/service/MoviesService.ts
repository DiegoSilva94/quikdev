import axios from 'axios';
const movie = {
    getMovies: (page, search) => {
        let params = {};
        if (page)
            params = {
                ...{page: page}
            }
        if(search)
            params = {
                ...params,
                ...{search: search}
            }
        return axios.get('/api/movie',{
            params: params
        });
    },
    getMovie: (id) => {
        return axios.get('/api/movie/' + id);
    }
}

export default movie;
