<template>
    <div>
      <h2>Repository List</h2>
  
      <!-- Form for adding a new repository -->
      <form @submit.prevent="addRepository">
      <input type="text" v-model="newRepository.title" placeholder="Title" required />
      <input type="text" v-model="newRepository.author" placeholder="Author" required />
      <input type="number" v-model="newRepository.year" placeholder="Year" required />
      <input type="text" v-model="newRepository.description" placeholder="Description" required />
      <button type="submit">Add Repository</button>
    </form>

  
      <!-- Table to display repositories -->
      <div class="table-responsive">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Description</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(repository, index) in repositories" :key="repository.id">
            <td>{{ index + 1 }}</td>
            <td>{{ repository.title }}</td>
            <td>{{ repository.author }}</td>
            <td>{{ repository.year }}</td>
            <td>{{ repository.description }}</td>
            <td>
              <button @click="editRepository(repository)" class="btn btn-primary btn-sm">Edit</button>
              <button @click="deleteRepository(repository.id)" class="btn btn-danger btn-sm">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
  
  <script>
  export default {
    data() {
  return {
    repositories: [],
    newRepository: {
        title: '',
        author: '',
        year: '',
        description: '',
      },
    isEditing: false,
    editedRepositoryId: null,
    
  };
},
    methods: {
      // Function to fetch repositories from the API
      async getRepository() {
        try {
          const response = await this.axios.get('/api/repository');
          this.repositories = response.data.repositories;
        } catch (error) {
          console.error('Error fetching repositories: ', error);
        }
      },
      // Function to add a new repository to the API
      async addRepository() {
        try {
          await this.axios.post('/api/repository/store', this.newRepository);
          this.getRepository();
          this.clearForm();
        } catch (error) {
          console.error('Error adding repository: ', error);
        }
      },
      
      // Function to delete a repository from the API
      async deleteRepository(id) {
        try {
          await this.axios.get(/api/repository/${id}/destroy);
          this.getRepository();
        } catch (error) {
          console.error('Error deleting repository: ', error);
        }
      },
      // Function to populate the edit form with repository data
      editRepository(repository) {
        this.isEditing = true;
        this.editedRepository = { ...repository };
      },
      // Function to update the repository in the API
      async updateRepository() {
        try {
          await this.axios.post(/api/repository/update/${this.editedRepository.id}, this.editedRepository);
          this.getRepository();
          this.cancelEdit();
        } catch (error) {
          console.error('Error updating repository: ', error);
        }
      },
      
      cancelEdit() {
        this.isEditing = false;
        this.editedRepository = {
          id: null,
          title: '',
          author: '',
          year: '',
          description: '',
        };
      },
      clearForm() {
        this.newRepository = {
          title: '',
          author: '',
          year: '',
          description: '',
        };
      },
    },
    mounted() {
      this.getRepository();
    },
  };
  </script>
  
  <style scoped>
  /* Your CSS styles */
  </style>