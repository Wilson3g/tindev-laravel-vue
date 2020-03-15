<template>
    <div class="login-container">
      <form>
        <img src="../../assets/logo.svg" alt="Tindev"/>
        <input 
          placeholder="Digite seu usuário no Github"
        />
        <button type="submit">Enviar</button>
      </form>
    </div>
</template>

<script>
    export default{
        name: 'LoginPage',
    }
</script>

<style>
.login-container {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 50%;
}

.login-container form {
  width: 100%;
  max-width: 300px;
  display: flex;
  flex-direction: column;
}

.login-container form input {
  margin-top: 20px;
  border: 1px solid #ddd;
  border-radius: 4px;
  height: 48px;
  padding: 0 20px;
  font-size: 16px;
  color: #666;
}

.login-container form input::placeholder {
  color: #999;
}

.login-container form button {
  margin-top: 10px;
  border: 0;
  border-radius: 4px;
  height: 48px;
  font-size: 16px;
  background: #DF4723;
  font-weight: bold;
  color: #FFF;
  cursor: pointer;
}
</style>