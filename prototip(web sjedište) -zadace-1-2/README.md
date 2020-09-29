# RNWA2020

### Upute za instalaciju ###

1. Odabrati direktorij gdje ćete spremiti sve vježbe
2. Postaviti korisničko ime i email
```
git config --global user.name "John Doe"
git config --global user.email johndoe@example.com
```
3. Klonirati remote repozirotij na svoje računalo
```
git clone https://github.com/toneymar11/RNWA2020.git
cd RNWA2020
```
4. Inicijalizirali lokalni git repostorijum
```
git init
```
4. Dodati udaljeni git repositorijum
```
git remote add RNWA2020 https://github.com/toneymar11/RNWA2020.git
```

### Slanje zadaće na udaljeni repositorijum
1. Provjeriti promjene s naredbom git status
```
git status
```
Rezultti bi trebao biti kao na slici

![alt text](https://d2wlcd8my7k9h4.cloudfront.net/media/images/d6a430a7-b6f8-4c70-9952-9904dcbfbaba.png)

2. Spremiti sve datoteke na kojima ste napravili izmjene u Index
```
git add RNWA2020/index.html
git add RNWA2020/assets/main.css
```
3. Nakon što smo dodali datoteke spremi smo za commit. Git status bi trebao izgledati ovako:

![alt text](https://gxcuf89792.i.lithium.com/t5/image/serverpage/image-id/136656i2AB4541C280CF45C/image-size/large?v=1.0&px=999)

4. Spremiti izmjene
```
git commit -m "Ovdje napisi ime commit-a"
```

5. Slanje lokalnih promjena na vaš udaljeni repozitorij

```
git push
