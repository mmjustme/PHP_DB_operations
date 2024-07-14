<?php
/* 
# GENERAL about hashing
# для хешування чутливих данний портібно salt,papper(секретне слово).
# поєднуємо чутливі дані з данними вище $dataToHash, через алгоритм 
# отримуємо хешовані дані hash
$sesetiveData = "Krossing";

# для хешування чутливих данний портібно salt,papper(секретне слово).
# salt генеруємо в хекс форматі через bin2hex, рандомно.
$salt = bin2hex(random_bytes(16));
# papper - це секретне слово
$papper = "ASecretPapperString";

# echo "<br>" . $salt;
# комбінуємо важливі дані з salt, papper
$dataToHash = $sesetiveData . $salt . $papper;
# хешуємо, "sha256" - algorytm
$hash = hash("sha256", $dataToHash);

# echo "<br>" . $hash;

# захешуємо щоб порвняти ще лдин пароль
#################################

$sesetiveData = "Krossing";

$storedSalt = $salt;
$storedHash = $hash;
$papper = "ASecretPapperString";


$dataToHash = $sesetiveData . $storedSalt . $papper;

$verificationHash = hash("sha256", $dataToHash);

# порівнюємо чи два значення які ми захешували однакові
# відповідно які salt і papper однакові хеш вийде теж однаковий
# і навпаки якщо salt і papper однакові але наш пароль введений не вірно
# захешовані дані будуть відрізнятися
if($storedHash === $verificationHash){
    echo "The data are the same!";
    echo "<br>";
    echo $storedHash;
    echo "<br>";
    echo $verificationHash;
} else {
    echo "The data are not the same!";
}
*/

#####################################
$pwdSignUp = "myPassword";

$options = [
    "cost"=> 12
];
# дана функція автоматично захешує дані
# PASSWORD_DEFAULT - один із методів хешування, 
# PASSWORD_BCRYPT - другий метод(рекомедовано зараз)
# $options - складність хешування, приймає масив
# напряму впливає на час тому рекомендовано числа від 1-12
$hasedPwd = password_hash($pwdSignUp, PASSWORD_BCRYPT, $options);
# так пароль зберігається в BD

# перевірка чи юзер ввів привильний пароль
$pwdLogin = "myPassword";
# порівнюємо що ввів юзер $pwdLogin, з вже захешованим паролем
# повертає true - false
// password_verify($pwdLogin, $hasedPwd);

if(password_verify($pwdLogin, $hasedPwd)) {
    echo "The data are the same!";
} else {
    echo "The data are not the same!";
}