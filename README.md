# Notas e desenvolvimento do estudo - **PHP**


## **Introdução ao PHP**


PHP é frequentemente embutido em HTML para adicionar funcionalidades dinâmicas. O código PHP é executado no servidor, e o resultado é enviado ao navegador como HTML simples.

**Exemplo básico de um script PHP:**

```php
<?php
  echo "Olá, mundo!";
?>

```

Aqui, `echo` é uma função PHP que imprime texto na página.

### **Variáveis**


Em PHP, as variáveis são representadas por um `$` antes do nome. Elas podem armazenar diferentes tipos de dados, como strings, inteiros, arrays, etc.

**Exemplo de variáveis:**

```php
<?php
$nome = "Kai";
$idade = 25;
echo "Nome: " . $nome . " e Idade: " . $idade;
?>
```

Nesse exemplo, usamos o operador `.` para concatenar strings.

### **Funções**


Funções em PHP permitem reutilizar blocos de código.

**Exemplo de função:**

```php
<?php
  function saudacao($nome) {
      return "Olá, " . $nome;
  }
  echo saudacao("Kai");
?>
```

### **Loops**


Loops são úteis para iterar sobre arrays (percorrendo por cada item de um array realizando alguma ação com eles) ou executar uma ação repetidamente.

**Exemplo de loop `for`:**

```php
<?php
  for ($i = 0; $i < 3; $i++) {
      echo $frutas[$i] . " ";
  }
?>
```

### **Estruturas de Controle**


PHP suporta estruturas de controle como `if`, `else`, `while`, `for`, e `switch`.

**Exemplo de estrutura de controle `if`:**

```php
<?php
  $idade = 20;
  if ($idade >= 18) {
      echo "Você é maior de idade.";
  } else {
      echo "Você é menor de idade.";
  }
?>
```

### **Arrays**


**Exemplo de array:**

```php
<?php
  $frutas = array("Maçã", "Banana", "Laranja");
  echo $frutas[1];  // Saída: Banana
?>
```

Arrays são usados para armazenar vários valores em uma única variável.

### **Conectando ao Banco de Dados (MySQL)**


PHP pode interagir com bancos de dados, como o MySQL.

Exemplo básico de conexão com banco de dados:

```php
<?php
  $conexao = new mysqli("localhost", "usuario", "senha", "banco");

  if ($conexao->connect_error) {
      die("Falha na conexão: " . $conexao->connect_error);
  }

  echo "Conectado com sucesso!";
?>
```

### **Iniciar o Servidor PHP Local**


Execute o seguinte comando para iniciar o servidor local na porta 8000:php -S localhost:8000
O servidor será iniciado, e você verá uma mensagem indicando que ele está rodando. Com acesso via http://localhost:8000/index.html

### **Parar o Servidor PHP**

- Pressione `Ctrl + C` no terminal.

### **1. Funções Avançadas**


As funções avançadas permitem o uso de técnicas mais poderosas em PHP, como parâmetros padrão, funções anônimas (ou closures), recursão, e passagem de parâmetros por referência.

### 1.1. **Parâmetros com valores padrão**

Você pode definir valores padrão para parâmetros nas funções. Se o valor não for passado, o valor padrão será usado.

```php
<?php
function saudacao($nome = "Visitante") {
    return "Olá, " . $nome;
}

echo saudacao();  // Saída: Olá, Visitante
echo saudacao("Kai");  // Saída: Olá, Kai
?>
```

Nesse exemplo, usamos o operador `.` para concatenar strings.

### 1.2. **Funções Anônimas**

Funções anônimas, ou closures, são funções que não têm nome e podem ser atribuídas a variáveis.

```php
<?php
$saudacao = function($nome) {
    return "Olá, " . $nome;
};

echo $saudacao("Kai");  // Saída: Olá, Kai
?>
```

### 1.3. **Passagem de Parâmetros por Referência**

Em vez de passar uma cópia do valor, você pode passar o valor por referência usando `&`.

```php
<?php
function dobrar(&$numero) {
    $numero *= 2;
}

$valor = 5;
dobrar($valor);
echo $valor;  // Saída: 10
?>
```

### 1.4. **Recursão**

Uma função pode chamar a si mesma. Isso é útil para problemas como cálculo de fatorial.

```php
<?php
function fatorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * fatorial($n - 1);
    }
}

echo fatorial(5);  // Saída: 120
?>
```
### 2. **Manipulação de Arquivos**


PHP permite abrir, ler, escrever e fechar arquivos de várias maneiras. Aqui estão os exemplos básicos:

### 2.1. **Abrindo e Lendo Arquivos**

```php
<?php
$arquivo = fopen("exemplo.txt", "r") or die("Não foi possível abrir o arquivo!");
echo fread($arquivo, filesize("exemplo.txt"));
fclose($arquivo);
?>
```

Neste exemplo, o arquivo `exemplo.txt` é aberto no modo de leitura (`"r"`) e todo o seu conteúdo é lido.

### 2.2. **Escrevendo em Arquivos**

```php
<?php
$arquivo = fopen("exemplo.txt", "w") or die("Não foi possível abrir o arquivo!");
$texto = "Escrevendo algo no arquivo.\n";
fwrite($arquivo, $texto);
fclose($arquivo);
?>
```

Aqui, o arquivo é aberto no modo de escrita (`"w"`), e o conteúdo é escrito.

### 2.3. **Lendo linha a linha**

```php
<?php
$arquivo = fopen("exemplo.txt", "r") or die("Não foi possível abrir o arquivo!");
while (!feof($arquivo)) {
    echo fgets($arquivo) . "<br>";
}
fclose($arquivo);
?>
```

Este código lê o arquivo linha por linha até o fim (`feof`).

### **Exemplo Completo: Lendo um Arquivo Linha por Linha**

Aqui está um exemplo completo que mostra como abrir um arquivo, ler linha por linha e fechar o arquivo.

```php
<?php
// Abre o arquivo em modo de leitura
$arquivo = fopen("exemplo.txt", "r");

if ($arquivo) {
    // Continua lendo até o fim do arquivo
    while (!feof($arquivo)) {
        // Lê uma linha do arquivo
        $linha = fgets($arquivo);
        echo $linha . "<br>";  // Exibe a linha com uma quebra de linha
    }
    
    // Fecha o arquivo após a leitura
    fclose($arquivo);
} else {
    echo "Não foi possível abrir o arquivo.";
}
?
```

**O que acontece aqui:**

1. **`fopen`**: Abre o arquivo "exemplo.txt" em modo de leitura.
2. **`feof`**: O loop `while` continua até o fim do arquivo.
3. **`fgets`**: Lê uma linha por vez do arquivo.
4. **`fclose`**: Fecha o arquivo ao final da leitura.

### 3. **Sessões**


Sessões permitem armazenar informações do usuário enquanto ele navega pelas páginas. As informações ficam armazenadas no servidor e são acessíveis enquanto a sessão estiver ativa.

### 3.1. **Iniciando uma sessão**

Antes de usar sessões, você precisa inicializá-la.

```php
<?php
session_start();  // Inicia a sessão
$_SESSION["usuario"] = "Kai";  // Armazena dados na sessão
echo "Olá, " . $_SESSION["usuario"];  // Acessa os dados da sessão
?>
```

### 3.2. **Destruindo uma sessão**

```php
<?php
session_start();
session_destroy();  // Remove todas as variáveis de sessão
?>
```

### 4. **Cookies**

Cookies são usados para armazenar pequenas quantidades de dados no navegador do usuário. Eles podem durar por um tempo determinado ou até que o navegador seja fechado.

### 4.1. **Criando um Cookie**

```php
<?php
setcookie("usuario", "Kai", time() + (86400 * 30), "/");  // Cria um cookie válido por 30 dias
?>
```

Aqui, `setcookie` define o cookie com o nome `usuario`, valor `Kai`, e ele expira em 30 dias.

### 4.2. **Lendo um Cookie**

```php
<?php
setcookie("usuario", "", time() - 3600, "/");  // Define um cookie com tempo de expiração negativo para deletá-lo
?>
```


### O que é `$_SERVER`?


`$_SERVER` é uma **superglobal** do PHP, uma variável disponível globalmente que contém informações sobre o ambiente do servidor e da requisição. As superglobais, como `$_SERVER`, `$_POST`, `$_GET`, são acessíveis de qualquer parte do código, sem a necessidade de serem passadas como parâmetro.

No caso de `$_SERVER["REQUEST_METHOD"]`, essa variável indica o **método HTTP** utilizado para fazer a requisição à página, ou seja, como os dados foram enviados do cliente (navegador) para o servidor.

### Métodos de Requisição Comuns:

- **GET**: Dados enviados pela URL, visíveis na barra de endereços (geralmente usados para exibir ou buscar informações).
- **POST**: Dados enviados no corpo da requisição, não visíveis na URL (usado para enviar formulários, fazer uploads, etc.).

### Como funciona `$_SERVER["REQUEST_METHOD"] == "POST"`?


Essa verificação identifica se o método utilizado na requisição foi **POST**. Ou seja, quando um formulário é enviado via POST, essa condição será verdadeira. É comum usarmos essa verificação para processar dados enviados por formulários de maneira segura, garantindo que o PHP execute o código de processamento **apenas** quando o formulário for enviado, e não ao simplesmente carregar a página.

### Exemplo Genérico de Estrutura:

```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Este bloco só executa quando o formulário for enviado
    // Aqui você pode acessar os dados enviados
    $variavel = $_POST['campoDoFormulario'];
    // Processar os dados...
} else {
    // Código executado quando o método não é POST (por exemplo, na primeira visita à página)
}
```

### Estrutura do Formulário HTML

Para que o código acima funcione, você precisa de um formulário HTML que envie dados via método **POST**. Exemplo:

```php
<form method="POST" action="">
    <label for="campo">Insira o dado:</label>
    <input type="text" id="campo" name="campoDoFormulario">
    <input type="submit" value="Enviar">
</form>
```

- **method="POST"**: Especifica que o formulário será enviado usando o método POST.
- **action=""**: Define para onde os dados serão enviados. Neste caso, os dados serão enviados para a mesma página.

### Por que usar POST ao invés de GET?

- **Segurança**: Os dados não aparecem na URL, o que é útil para informações sensíveis como senhas.
- **Capacidade**: O método POST permite enviar uma quantidade maior de dados e tipos mais complexos, como arquivos.
- **Funcionalidade**: POST é utilizado para operações que alteram algo no servidor (como gravar no banco de dados ou processar informações).

### Resumo para Estudo

---

1. `$_SERVER["REQUEST_METHOD"]` retorna o método HTTP usado para a requisição.
2. `$_SERVER["REQUEST_METHOD"] == "POST"` é usado para verificar se o formulário foi enviado via POST.
3. O método **POST** é preferido para enviar dados de forma segura e eficiente, ocultando-os da URL.
4. Sempre use essa verificação ao processar formulários, garantindo que os dados sejam manipulados apenas após o envio do formulário.

### O Que é `htmlspecialchars`?


`htmlspecialchars` é uma função PHP que converte caracteres especiais em entidades HTML. Isso significa que caracteres como `<`, `>`, e `&` são transformados em suas representações HTML (`&lt;`, `&gt;`, e `&amp;`, respectivamente). Isso ajuda a garantir que esses caracteres não sejam interpretados como código HTML ou JavaScript quando exibidos em uma página web.

### O Que é `filter_var` com `FILTER_VALIDATE_EMAIL` ?

---

A função `filter_var` em PHP é usada para filtrar e validar dados.
**Exemplo de estrutura:**

!filter_var($email, FILTER_VALIDATE_EMAIL)

### Explicação

1. **`filter_var($email, FILTER_VALIDATE_EMAIL)`**: Esta função verifica se a variável `$email` é um endereço de e-mail válido. O segundo argumento, `FILTER_VALIDATE_EMAIL`, especifica que o filtro deve validar o formato do e-mail.
    - Se o `$email` for um e-mail válido, `filter_var` retorna o e-mail como string.
    - Se não for válido, `filter_var` retorna `false`.
2. **`!` (Operador de negação)**: O operador `!` é usado para inverter o resultado. Se `filter_var` retornar `false`, `!false` se torna `true`, e vice-versa.

### Exemplo Prático

```php
$email = "exemplo@dominio.com";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "O e-mail fornecido não é válido.";
} else {
    echo "O e-mail fornecido é válido.";
}
```

- **`filter_var($email, FILTER_VALIDATE_EMAIL)`**: Valida se `$email` é um e-mail válido.
- **`!`**: Inverte o resultado da validação.
- Se o e-mail não for válido, o código dentro do `if` será executado; caso contrário, o `else` será executado.

Isso ajuda a garantir que apenas endereços de e-mail válidos sejam processados em seu aplicativo PHP.

### Conn

`$conn` é uma extensão do PHP usada para interagir com o banco de dados MySQL. Essa variável armazena a instância da classe **`mysqli`**, representando a conexão estabelecida com o banco de dados MySQL no PHP. Essa instância permite que você interaja com o banco de dados para realizar operações como consultas, inserções, atualizações e exclusões.

### Estrutura da Conexão

```php
$conn = new mysqli($servername, $username, $password, $dbname);
```

Você está criando uma nova conexão com o banco de dados MySQL e armazenando essa conexão dentro da variável `$conn`. Essa variável será usada em todas as operações subsequentes que você fizer com o banco de dados.
`$conn = new mysqli` é a maneira como você cria uma conexão com um banco de dados MySQL usando **MySQLi**, uma extensão do PHP usada para interagir com o banco de dados MySQL.

### Importância de Verificar a Conexão

Se a conexão com o banco de dados falhar, isso pode ocorrer por diversos motivos, como:

- Credenciais de acesso incorretas (usuário/senha).
- O banco de dados não está rodando.
- A base de dados não existe.

### Statements


Em PHP, o `$stmt` geralmente se refere a uma variável que representa um **statement** (declaração ou instrução) preparada para execução, geralmente quando usamos **prepared statements** com bancos de dados. Ele é frequentemente utilizado com a **extensão MySQLi** ou **PDO** para garantir segurança contra ataques de injeção SQL e melhorar o desempenho em consultas repetidas.

### Contexto de `$stmt`

Quando trabalhamos com consultas preparadas (prepared statements), primeiro criamos uma instrução SQL, a preparamos, vinculamos os parâmetros e depois a executamos. O objeto `$stmt` refere-se à instrução preparada.

```php
$stmt = $conn->prepare("INSERT INTO usuarios (nome, idade, salario) VALUES (?, ?, ?)");
$stmt->bind_param("sid", $nome, $idade, $salario);
```

### Vantagens de Usar `$stmt` (Prepared Statements)

- **Segurança**: Evita injeção de SQL, já que os parâmetros são vinculados em vez de concatenados diretamente na query.
- **Eficiência**: A mesma consulta pode ser executada várias vezes com diferentes parâmetros sem ser recompilada no servidor de banco de dados.

Essencialmente, `$stmt` é um objeto que representa a consulta SQL preparada e pronta para ser executada, proporcionando segurança e eficiência no acesso ao banco de dados.
Legenda de caractere STMT:

- **"s"**: Significa **string**. Isso é usado quando o valor do parâmetro é uma cadeia de caracteres (texto).
- **"i"**: Significa **integer** (inteiro). Usado para números inteiros.
- **"d"**: Significa **double**. Usado para números de ponto flutuante (números com casas decimais).
- **"b"**: Significa **blob**. Usado para grandes objetos binários, como arquivos ou imagens.
---
