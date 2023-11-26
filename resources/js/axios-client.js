import axios from 'axios';

const baseURL = 'http://localhost:8000/api'; // Replace with your server URL

const axios_client = axios.create({
  baseURL,
});

export default axios_client;