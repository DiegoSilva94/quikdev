import axios from 'axios';
const genre = {
    getGenres: () => {
        return axios.get('/api/genre/');
    }
}
export default genre;
