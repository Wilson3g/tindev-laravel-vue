<template>
    <div class="main-container">
        <img src="../../../assets/logo.svg"/>
        <ul>
            <li v-for="users in users.data" :key="users.name">
              <img :src="users.avatar" alt="" />
              <footer>
                <p><b>{{users.user}}</b></p>
                <span>{{users.name}}</span>
                <p>{{ users.bio || "Sem descrição"}}</p>
              </footer>

              <div class="buttons">
                <button @click="dislikeUser" type="button">
                  <img src="../../../assets/dislike.svg" alt="Dislike" />
                </button>
                <button @click="likeUser" type="button">
                  <img src="../../../assets/like.svg" alt="Like" />
                </button>
              </div>
            </li>
        </ul>

    </div>
</template>

<script>
    export default{
        name: 'MainPage',
        data() {
          return {
            users:{},
          }
        },
        created(){
          this.$http.get('http://127.0.0.1:8000/api/devs').then(response => {
            this.users = response.data
          }, response => {
            console.log('Error' + response)
          });
        },
        methods:{
          likeUser(){
            console.log('like')
          },
          dislikeUser(){
            console.log('dislike')
          }
        }
    }
</script>

<style>
.main-container {
max-width: 980px;
margin: 0 auto;
padding: 50px 0;
text-align: center;
}

.main-container ul {
  list-style: none;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 30px;
  margin-top: 50px;
}

.main-container ul li {
  display: flex;
  flex-direction: column;
}

.main-container ul li img {
  max-width: 100%;
  border-radius: 5px 5px 0 0;
}

.main-container ul li footer {
  flex: 1;
  background: #fff;
  border: 1px solid #eee;
  padding: 15px 20px;
  text-align: left;
  border-radius: 0 0 5px 5px;
}

.main-container ul li .buttons {
  margin-top: 10px;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 10px;
}

.main-container ul li .buttons button {
  height: 50px;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.05);
  border: 0;
  border-radius: 4px;
  background: ;
  cursor: pointer;
}

.main-container ul li .buttons button:hover img {
  transform: translateY(-5px);
  transition: all 0.2s;
}
</style>