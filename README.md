# Sumário
- [Date - método Advance](https://github.com/marifujikawa/avaliacao_php#date---m%C3%A9todo-advance)

- [Melhorias no código](https://github.com/marifujikawa/avaliacao_php#melhorias-no-c%C3%B3digo)

- [Considerações ](https://github.com/marifujikawa/avaliacao_php#considera%C3%A7%C3%B5es)

# Date - método Advance

- inicialmente criei uma classe `Date`, que possui os métodos para devolver o próximo dia. 

- inicializei no construtor da classe um atributo date recebendo a data atual, utilizando a classe `DateTime`.  

```php
    protected $date;

    function __construct()
    {
        $this->date = new DateTime();
    }
```

- criei um método público chamado `today()` para trazer a data de hoje no modelo d/m/Y

```php
    public function today()
    {
        return (new DateTime())->format('d/m/Y');
    }
```
- criei o método público `getDate()` para retornar a data definida no atributo protegido `$date`, também formatada no modelo d/m/Y.

```php
    public function getDate()
    {
        return $this->date->format('d/m/Y');
    }
```
- criei o método `advance()` para adicionar 1 dia no atributo protegido `$date`, retornando o próximo dia.


```php
    public function advance()
    {
        date_add($this->date, date_interval_create_from_date_string('1 day'));
        return $this->getDay();
    }
```

- criei os métodos públicos `getDay()`, `getMonth()` e `getYear()` para retornar o dia, mês e ano respectivamente, que estão armazenados no atributo protegido `$date`.

 ```php
    public function getDay()
    {
        return $this->date->format('d');
    }
    public function getMonth()
    {
        return $this->date->format('m');
    }
    public function getYear()
    {
        return $this->date->format('Y');
    }

```
- para executar o programa, execute no terminal: 
```bash
    php date.php
```
- Nele, veremos inicialmente a data atual. Em seguida há o dia seguinte e, por fim, a nova data, no modelo d/m/Y.

Exemplo:
```bash
Data atual:
20/10/2021

Método Advance retornando o próximo dia:
21

Nova Data:
21/10/2021
```



# Melhorias no código

- inicialmente indentei o código para ter uma ideia melhor do que estava acontecendo. 

- Em seguida, percebi que o cógido não possuía nenhuma subdivisão para especificar as partes de regra, de html e de estilo. Dessa forma, optei por criar essas subdivisões para deixar o código mais limpo. 

- Na parte da regra peguei as partes do código que selecionavam os dados do banco de dado. Porém, percebendo que as variáveis possuíam o mesmo nome, optei por modificá-las para deixar mais claro o que cada uma delas representava. 

Código antigo:
```php 
$sql = "SELECT * FROM users ORDER BY date_registered";
$result = mysql_query($sql) or die(mysql_error()); 

$sql = "SELECT * FROM table WHERE column = 'test'";
$result = mysql_query($sql) or die(mysql_error());
```

Nova proposição de código:
```php 
$userQuery = "SELECT * FROM users ORDER BY date_registered";
$users = mysql_query($userQuery) or die(mysql_error());


$tableQuery = "SELECT * FROM table WHERE column = 'test'";
$tables = mysql_query($tableQuery) or die(mysql_error());
```



- Havia uma função chamada `random_custom_function()`, porém, ao analisar o que ela fazia, percebi que em realidade ela não acrescentava valor ao código, pois não transformava o valor em algo aleatório e somente acrescentava 1 na variável. Assim, optei por realizar esse acréscimo no span, para deixar mais visível esse acréscimo. 

Código antigo:
```php 
function random_custom_function($var)
{
    $var = $var + 1;
    return '<span style="font-weight:bold;">' . $var . '</span>';
}
```

Nova proposição de código:
```php 
<div class="table-value">
    <span><?php echo $row['val'] + 1; ?> </span>
</div>

```
- Na parte do html optei por retirar a tag de tabela da parte que exibiria "Found none", pois como era apenas um texto, acreditei que uma div com uma classe seria melhor. 

Código antigo:
```php
 if ($i == 0) {
    echo '<table>';
    echo '<tr><td>Found none!</td></tr>';
    echo '</table>';} 
```

Nova proposição de código:
```php 
 <?php if (!$tables) { ?>

        <div class="table-value">
            Found none!
        </div>

    <?php } ?>
``` 


- Além disso, havia partes em que havia a definição de classes nas divs. Porém, havia também a opção de "style" nas divs. Assim, optei por criar uma parte de Style, em que criei classes, substituindo, assim, o "style" que estava conjunto à div. 

Código antigo:

```php
echo '<table class="my-table-class">';
echo '<div style="margin-bottom:20px;">' . $row['val'] . '</div>';
```

Nova proposição de código:

```html
<style type="text/css">
    .users-table {}

    #test.table-value {
        margin-bottom: 20px;
    }

    #test.table-value>span {
        font-weight: bold;
    }
</style>
```

- Caso eu fosse reescrever esse código inteiramente, ou começar algo do zero, eu criaria models para serializar o código do banco em collections, separaria em três camadas: repositórios, com as queries e consultas ao banco; o back-end, que consultaria os repositórios e controlaria o fluxo da informação; o front-end que seria apenas responsável para exibir a informação, sem ter regras de negócio. 




# Considerações

- acredito que o teste solicitado foi interessante. A parte inicial, relativa a conhecimentos específicos do PHP, foi importante para o teste de aspectos da linguagem. A questão número 5, inclusive, foi uma novidade para mim, pois desconhecia a utilização de variáveis dinâmicas, as variáveis variáveis. Achei que o exercício 10, sobre a melhoria do código, foi muito válido, considerando que por vezes temos que trabalhar com códigos legados. Referente aos exercícios de lógica, acredito que são válidos considerando que para programarmos a lógica sempre é necessária. 