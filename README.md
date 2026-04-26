# Location Événementiel — Site web premium

Refonte moderne de [location-evenementiel.ma](https://location-evenementiel.ma) :
même structure de menu, mêmes catégories et mêmes produits exactement, mais
une UI/UX premium, un header glassmorphism, et des cartes produits modernisées.

Bâti en **PHP natif**, sans framework, avec une **architecture MVC** propre,
un **Singleton** pour la base de données, un routeur maison, des vues sécurisées
contre XSS, une protection CSRF sur le formulaire, et un design responsive
avec animations légères.

---

## 1. Stack & choix techniques

- **PHP 8.1+** natif (pas de framework, pas de Composer requis)
- **MySQL / MariaDB** (optionnel — le site fonctionne aussi sans BDD grâce à des données de fallback dans les modèles)
- **Front** : HTML5 sémantique, CSS3 moderne (variables, grid, animations), JavaScript vanilla
- Polices Google : `Cormorant Garamond` (serif élégante) + `Inter` (sans-serif lisible)
- Icônes : Lucide

---

## 2. Structure MVC

```
location-evenementiel/
├── index.php                 # Front controller (point d'entrée unique)
├── .htaccess                 # Réécriture d'URL Apache
├── database.sql              # Schéma et données d'exemple
├── README.md
│
├── config/
│   └── config.php            # Configuration globale + helpers (e, url, asset, config)
│
├── core/                     # Cœur du framework maison
│   ├── Database.php          # Singleton PDO
│   ├── Router.php            # Routeur (GET/POST → Controller@action)
│   └── Controller.php        # Contrôleur de base (view, redirect, csrf, validation)
│
├── app/
│   ├── controllers/          # 1 contrôleur par section
│   │   ├── HomeController.php
│   │   ├── AboutController.php
│   │   ├── CategoryController.php   # 3 actions : meuble / informatique / sonorisation
│   │   └── ContactController.php
│   │
│   ├── models/               # Accès aux données
│   │   ├── Category.php             # 3 catégories du site
│   │   ├── Product.php              # produits exacts du site source
│   │   ├── Testimonial.php
│   │   └── ContactMessage.php
│   │
│   └── views/
│       ├── layouts/
│       │   ├── header.php    # <head>, navbar glassmorphism
│       │   └── footer.php    # Footer + boutons flottants
│       └── pages/
│           ├── home.php
│           ├── about.php
│           ├── category.php  # vue partagée pour les 3 catégories
│           ├── contact.php
│           └── 404.php
│
└── public/
    └── assets/
        ├── css/style.css
        ├── js/main.js
        └── images/           # (vide — les visuels sont sourcés depuis Unsplash)
```

### Comment ça fonctionne

1. **Toutes les requêtes HTTP** passent par `index.php` (grâce au `.htaccess`).
2. `index.php` charge l'**autoloader**, la **config**, puis crée un `Router`.
3. Le routeur **mappe** la méthode + l'URL à un couple `Controller@action` :
   `GET /informatique` → `CategoryController@informatique`.
4. Le **contrôleur** récupère les données via les **modèles** et appelle
   `$this->view('category', [...])` qui injecte les données dans la vue.
5. La méthode `view()` du `Controller` de base assemble :
   `header.php` + la vue de page + `footer.php` — c'est notre layout MVC.

### Singleton — `core/Database.php`

`Database::getInstance()` garantit qu'une **seule** connexion PDO existe pendant
toute la requête. Le constructeur est privé (impossible de faire `new Database()`),
le clonage et la désérialisation sont bloqués.

```php
$db   = Database::getInstance();
$rows = $db->all('SELECT * FROM services');
$id   = $db->insert('contact_messages', ['name' => $name, ...]);
```

### Sécurité

- **XSS** : helper `e()` utilisé partout dans les vues (`htmlspecialchars` avec `ENT_QUOTES`).
- **SQL injection** : toutes les requêtes utilisent des **prepared statements** PDO.
- **CSRF** : token généré dans la session, vérifié à la soumission du formulaire de contact.
- **Headers HTTP** : `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`, etc. dans `.htaccess`.

---

## 3. Installation locale

### Pré-requis

- PHP **8.1+** avec extension `pdo_mysql`
- Apache avec `mod_rewrite` (XAMPP, MAMP, Laragon, WAMP, Apache+PHP-FPM…)
- MySQL / MariaDB *(optionnel — voir étape 4)*

### Étapes

1. **Cloner / copier** le dossier dans la racine de votre serveur :

   - **XAMPP / WAMP** (Windows) : `C:\xampp\htdocs\location-evenementiel`
   - **MAMP** (Mac) : `~/Applications/MAMP/htdocs/location-evenementiel`
   - **Laragon** : `C:\laragon\www\location-evenementiel`

2. **(Optionnel) Importer la base de données** :

   ```bash
   mysql -u root < database.sql
   ```

   ou via phpMyAdmin → onglet **Importer** → choisir `database.sql`.

3. **Configurer la connexion** dans `config/config.php` :

   ```php
   'database' => [
       'host'     => '127.0.0.1',
       'name'     => 'elegance_events',
       'user'     => 'root',
       'password' => '',  // votre mot de passe MySQL
       ...
   ],
   ```

4. **Lancer le site** : ouvrir
   `http://localhost/location-evenementiel/`

   > 💡 Sans installer la BDD, le site fonctionne tel quel grâce aux **données
   > de fallback** définies dans les modèles. Le formulaire de contact valide
   > et affiche un message de succès, mais n'enregistre pas en base.

### Avec le serveur PHP intégré (sans Apache)

Si vous n'avez pas Apache, vous pouvez utiliser le serveur intégré de PHP :

```bash
cd location-evenementiel
php -S localhost:8000 router.php
```

Puis ouvrir `http://localhost:8000/`.

> Le fichier `router.php` à la racine sert de fallback : il sert les fichiers
> statiques existants (CSS, JS, images) tels quels, et route tout le reste vers
> `index.php` — exactement comme le ferait `.htaccess`.

---

## 4. Pages disponibles

| URL                  | Page                                                            |
|----------------------|-----------------------------------------------------------------|
| `/`                  | Accueil (hero, 3 catégories, produits phares, témoignages, CTA) |
| `/a-propos-de-nous`  | À propos : approche, engagements, statistiques                  |
| `/meuble-de-bureau`  | Catégorie : chaises, tables, bureaux                            |
| `/informatique`      | Catégorie : TV, imprimantes, PC, écrans, bornes, totems...      |
| `/sonorisation`      | Catégorie : micros sans fil, haut-parleurs                      |
| `/contact`           | Formulaire (validé client + serveur) + Google Maps              |

Les URLs reproduisent **exactement** celles du site source.
La liste des produits est **identique** au site source (aucune suppression, aucun ajout).

---

## 5. Personnalisation rapide

| Quoi                | Où                                              |
|---------------------|-------------------------------------------------|
| Nom, email, tél…    | `config/config.php` → tableau `app`             |
| Couleurs / fonts    | `public/assets/css/style.css` → `:root`         |
| Catégories          | Méthode `Category::all()` (3 entrées hard-codées comme le site source) |
| Produits            | Table `products` ou `Product::fallback()`        |
| Témoignages         | Table `testimonials` ou `Testimonial::all()`     |
| Adresse Maps        | `app/views/pages/contact.php` → `<iframe src="…">` |

---

## 6. Bonus inclus

- ✅ **Header glassmorphism** premium : transparent sur le hero, blur + saturation au scroll
- ✅ **Animation d'entrée** (fade + slide-down) à l'arrivée sur la page
- ✅ **Underline animé** avec halo lumineux doré sur les liens du menu
- ✅ **CTA téléphone** dans le header (call-to-action principal)
- ✅ **Bouton flottant** "Appeler maintenant" avec animation pulse
- ✅ Section **témoignages** clients + **« Pourquoi nous choisir »** + stats
- ✅ **Animations reveal** au scroll (`IntersectionObserver`)
- ✅ **Menu mobile** plein écran avec backdrop-blur
- ✅ **Bouton retour en haut**
- ✅ Validation **client + serveur** du formulaire
- ✅ **Meta tags SEO** + Open Graph + theme-color
- ✅ Respect de `prefers-reduced-motion`
- ✅ **Responsive** mobile / tablette / desktop

---

## 7. Licence & crédits

Code : libre d'utilisation et de modification.
Visuels d'illustration : [Unsplash](https://unsplash.com/) (libres de droit).
Polices : Google Fonts (Cormorant Garamond, Inter).
Icônes : [Lucide](https://lucide.dev/).
