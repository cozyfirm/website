-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2024 at 08:17 PM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cozyfirm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_05_21_195918___single_pages', 1),
(2, '0001_01_01_000000_create_users_table', 2),
(3, '0001_01_01_000001_create_cache_table', 2),
(4, '0001_01_01_000002_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YmbrBexF168WzqIgb8VnMTFlr9VrPUxT2SXjdVeE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieE5vWnJKcGV1Z3lzdFhzanA2NU1XdjRSRmRTNW05WmR6eEVVNGtZdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1716322474);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `licence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `__single_pages`
--

DROP TABLE IF EXISTS `__single_pages`;
CREATE TABLE IF NOT EXISTS `__single_pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__single_pages`
--

INSERT INTO `__single_pages` (`id`, `title`, `description`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'HomeController.php', '<div style=\"background-color:#1e1f22;color:#bcbec4\"><pre style=\"font-family: &quot;JetBrains Mono&quot;, monospace; line-height: 1.2;\"><div><pre style=\"font-family:\'JetBrains Mono\',monospace;font-size:9,0pt;\"><span style=\"color:#cf8e6d;\">&lt;?php<br></span><span style=\"color:#cf8e6d;\"><br></span><span style=\"color:#cf8e6d;\">namespace </span>App\\Http\\Controllers\\Auth;<br><br><span style=\"color:#cf8e6d;\">use </span>App\\Http\\Controllers\\Controller;<br><span style=\"color:#cf8e6d;\">use </span>App\\Mail\\Users\\RestartPassword;<br><span style=\"color:#cf8e6d;\">use </span>App\\Models\\Models\\Core\\Country;<br><span style=\"color:#cf8e6d;\">use </span>App\\Models\\Models\\UserModels\\RestartToken;<br><span style=\"color:#cf8e6d;\">use </span>App\\Models\\User;<br><span style=\"color:#cf8e6d;\">use </span>App\\Traits\\Http\\ResponseTrait;<br><span style=\"color:#cf8e6d;\">use </span>App\\Traits\\Users\\UserBaseTrait;<br><span style=\"color:#cf8e6d;\">use </span>Carbon\\Carbon;<br><span style=\"color:#cf8e6d;\">use </span>Illuminate\\Http\\Request;<br><span style=\"color:#cf8e6d;\">use </span>Illuminate\\Support\\Facades\\Auth;<br><span style=\"color:#cf8e6d;\">use </span>Illuminate\\Support\\Facades\\Hash;<br><span style=\"color:#cf8e6d;\">use </span>Illuminate\\Support\\Facades\\Mail;<br><br><span style=\"color:#cf8e6d;\">class </span>AuthController <span style=\"color:#cf8e6d;\">extends </span>Controller{<br>    <span style=\"color:#cf8e6d;\">use </span>UserBaseTrait, ResponseTrait;<br>    <span style=\"color:#cf8e6d;\">protected string </span><span style=\"color:#c77dbb;\">$_path </span>= <span style=\"color:#6aab73;\">\'public-part.auth.\'</span>;<br><br>    <span style=\"color:#5f826b;font-style:italic;\">/**<br></span><span style=\"color:#5f826b;font-style:italic;\">     *  Return Auth view<br></span><span style=\"color:#5f826b;font-style:italic;\">     */<br></span><span style=\"color:#5f826b;font-style:italic;\">    </span><span style=\"color:#cf8e6d;\">public function </span><span style=\"color:#56a8f5;\">auth</span>(){<br>        <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">view</span>(<span style=\"color:#9876aa;\">$this</span>-&gt;<span style=\"color:#c77dbb;\">_path</span>. <span style=\"color:#6aab73;\">\'auth\'</span>);<br>    }<br><br><div><pre style=\"font-family:\'JetBrains Mono\',monospace;font-size:9,0pt;\">    <span style=\"color:#cf8e6d;\">public function </span><span style=\"color:#56a8f5;\">authenticate</span>(Request <span style=\"color:#9876aa;\">$request</span>): <span style=\"color:#cf8e6d;\">bool</span>|<span style=\"color:#cf8e6d;\">string</span>{<br>        <span style=\"color:#cf8e6d;\">if</span>(<span style=\"color:#cf8e6d;\">empty</span>(<span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">email</span>)) <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">json_encode</span>([<span style=\"color:#6aab73;\">\'code\' </span>=&gt; <span style=\"color:#6aab73;\">\'1101\'</span>, <span style=\"color:#6aab73;\">\'message\' </span>=&gt; <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Molimo da unesete Vaš email\'</span>) ]);<br>        <span style=\"color:#cf8e6d;\">if</span>(<span style=\"color:#cf8e6d;\">empty</span>(<span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">password</span>)) <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">json_encode</span>([<span style=\"color:#6aab73;\">\'code\' </span>=&gt; <span style=\"color:#6aab73;\">\'1102\'</span>, <span style=\"color:#6aab73;\">\'message\' </span>=&gt; <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Molimo da unesete Vašu šifru\'</span>) ]);<br><br>        <span style=\"color:#cf8e6d;\">if</span>(Auth::<span style=\"color:#cf8e6d;\">attempt</span>([<span style=\"color:#6aab73;\">\'email\' </span>=&gt; <span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">email</span>, <span style=\"color:#6aab73;\">\'password\' </span>=&gt; <span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">password</span>])){<br>            <span style=\"color:#9876aa;\">$user </span>= Auth::<span style=\"color:#cf8e6d;\">user</span>();<br><br>            <span style=\"color:#cf8e6d;\">if</span>(<span style=\"color:#9876aa;\">$user</span>-&gt;<span style=\"color:#c77dbb;\">email_verified_at </span>== <span style=\"color:#cf8e6d;\">null</span>){<br>                Auth::<span style=\"color:#cf8e6d;\">logout</span>();<br>                <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">json_encode</span>([<br>                    <span style=\"color:#6aab73;\">\'code\' </span>=&gt; <span style=\"color:#6aab73;\">\'1102\'</span>,<br>                    <span style=\"color:#6aab73;\">\'message\' </span>=&gt; <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Molimo Vas da verifikujete Vaš račun!!\'</span>)<br>                ]);<br>            }<br><br>            <span style=\"color:#9876aa;\">$uri </span>= <span style=\"color:#57aaf7;\">route</span>(<span style=\"color:#6aab73;\">\'system.home\'</span>);<br>            <span style=\"color:#cf8e6d;\">if</span>(<span style=\"color:#9876aa;\">$user</span>-&gt;<span style=\"color:#c77dbb;\">role </span>== <span style=\"color:#6aab73;\">\'user\' </span><span style=\"color:#cf8e6d;\">or </span><span style=\"color:#9876aa;\">$user</span>-&gt;<span style=\"color:#c77dbb;\">role </span>== <span style=\"color:#6aab73;\">\'presenter\'</span>) <span style=\"color:#9876aa;\">$uri </span>= <span style=\"color:#57aaf7;\">route</span>(<span style=\"color:#6aab73;\">\'dashboard.my-profile\'</span>);<br><br>            <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">json_encode</span>([<br>                <span style=\"color:#6aab73;\">\'code\' </span>=&gt; <span style=\"color:#6aab73;\">\'0000\'</span>,<br>                <span style=\"color:#6aab73;\">\'message\' </span>=&gt; <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Uspješno ste se prijavili!\'</span>),<br>                <span style=\"color:#6aab73;\">\'url\' </span>=&gt; <span style=\"color:#9876aa;\">$uri<br></span><span style=\"color:#9876aa;\">            </span>]);<br><span style=\"color:#7a7e85;\"><br></span><span style=\"color:#7a7e85;\">        </span>}<span style=\"color:#cf8e6d;\">else </span>{<br>            <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">json_encode</span>([<br>                <span style=\"color:#6aab73;\">\'code\' </span>=&gt; <span style=\"color:#6aab73;\">\'1100\'</span>,<br>                <span style=\"color:#6aab73;\">\'message\' </span>=&gt; <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Pogrešni pristupni podaci. Molimo pokušajte ponovo!\'</span>)<br>            ]);<br>        }<br>    }</pre></div><br>    <span style=\"color:#5f826b;font-style:italic;\">/**<br></span><span style=\"color:#5f826b;font-style:italic;\">     * </span><span style=\"color:#67a37c;font-style:italic;\">@return </span><span style=\"color:#5f826b;font-style:italic;\">\\Illuminate\\Http\\RedirectResponse<br></span><span style=\"color:#5f826b;font-style:italic;\">     * Destroy sessions and log user out<br></span><span style=\"color:#5f826b;font-style:italic;\">     */<br></span><span style=\"color:#5f826b;font-style:italic;\">    </span><span style=\"color:#cf8e6d;\">public function </span><span style=\"color:#56a8f5;\">logout</span>(): <span style=\"color:#6f737a;\">\\Illuminate\\Http\\</span>RedirectResponse{<br>        Auth::<span style=\"color:#cf8e6d;\">logout</span>();<br>        <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">redirect</span>()-&gt;<span style=\"color:#57aaf7;\">route</span>(<span style=\"color:#6aab73;\">\'auth\'</span>);<br>    }<br><br>    <span style=\"color:#7a7e85;\">/* -------------------------------------------------------------------------------------------------------------- */<br></span><span style=\"color:#7a7e85;\">    /*<br></span><span style=\"color:#7a7e85;\">     *  Register Form<br></span><span style=\"color:#7a7e85;\">     */<br></span><span style=\"color:#7a7e85;\"><br></span><span style=\"color:#7a7e85;\">    </span><span style=\"color:#5f826b;font-style:italic;\">/**<br></span><span style=\"color:#5f826b;font-style:italic;\">     *  Return view for account creation<br></span><span style=\"color:#5f826b;font-style:italic;\">     */<br></span><span style=\"color:#5f826b;font-style:italic;\">    </span><span style=\"color:#cf8e6d;\">public function </span><span style=\"color:#56a8f5;\">createAccount</span>(){<br>        <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#57aaf7;\">view</span>(<span style=\"color:#9876aa;\">$this</span>-&gt;<span style=\"color:#c77dbb;\">_path</span>. <span style=\"color:#6aab73;\">\'create-account\'</span>, [<br>            <span style=\"color:#6aab73;\">\'prefixes\' </span>=&gt; Country::<span style=\"color:#cf8e6d;\">orderBy</span>(<span style=\"color:#6aab73;\">\'phone_code\'</span>)-&gt;<span style=\"color:#57aaf7;\">get</span>()-&gt;<span style=\"color:#57aaf7;\">pluck</span>(<span style=\"color:#6aab73;\">\'phone_code\'</span>, <span style=\"color:#6aab73;\">\'id\'</span>),<br>            <span style=\"color:#6aab73;\">\'countries\' </span>=&gt; Country::<span style=\"color:#cf8e6d;\">orderBy</span>(<span style=\"color:#6aab73;\">\'name_ba\'</span>)-&gt;<span style=\"color:#57aaf7;\">get</span>()-&gt;<span style=\"color:#57aaf7;\">pluck</span>(<span style=\"color:#6aab73;\">\'name_ba\'</span>, <span style=\"color:#6aab73;\">\'id\'</span>),<br>        ]);<br>    }<br><br>    <span style=\"color:#5f826b;font-style:italic;\">/**<br></span><span style=\"color:#5f826b;font-style:italic;\">     * </span><span style=\"color:#67a37c;font-style:italic;\">@param </span><span style=\"color:#5f826b;font-style:italic;\">Request </span><span style=\"color:#9876aa;font-style:italic;\">$request<br></span><span style=\"color:#9876aa;font-style:italic;\">     </span><span style=\"color:#5f826b;font-style:italic;\">* </span><span style=\"color:#67a37c;font-style:italic;\">@return </span><span style=\"color:#5f826b;font-style:italic;\">bool|\\Illuminate\\Http\\JsonResponse|string|void<br></span><span style=\"color:#5f826b;font-style:italic;\">     *<br></span><span style=\"color:#5f826b;font-style:italic;\">     * Ajax END-Point; Create new profile<br></span><span style=\"color:#5f826b;font-style:italic;\">     */<br></span><span style=\"color:#5f826b;font-style:italic;\">    </span><span style=\"color:#cf8e6d;\">public function </span><span style=\"color:#56a8f5;\">saveAccount</span>(Request <span style=\"color:#9876aa;\">$request</span>){<br>        <span style=\"color:#cf8e6d;\">try</span>{<br>            <span style=\"color:#7a7e85;\">/* Password cannot be empty */<br></span><span style=\"color:#7a7e85;\">            </span><span style=\"color:#cf8e6d;\">if</span>(!<span style=\"color:#cf8e6d;\">isset</span>(<span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">password</span>)) <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#9876aa;\">$this</span>-&gt;<span style=\"color:#57aaf7;\">jsonResponse</span>(<span style=\"color:#6aab73;\">\'1001\'</span>, <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Unesite Vašu šifru\'</span>));<br><br>            <span style=\"color:#7a7e85;\">/* Check for unique email */<br></span><span style=\"color:#7a7e85;\">            </span><span style=\"color:#9876aa;\">$user </span>= User::<span style=\"color:#cf8e6d;\">where</span>(<span style=\"color:#6aab73;\">\'email\'</span>, <span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">email</span>)-&gt;<span style=\"color:#57aaf7;\">first</span>();<br>            <span style=\"color:#cf8e6d;\">if</span>(<span style=\"color:#9876aa;\">$user</span>) <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#9876aa;\">$this</span>-&gt;<span style=\"color:#57aaf7;\">jsonResponse</span>(<span style=\"color:#6aab73;\">\'1002\'</span>, <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Odabrani email se već koristi\'</span>));<br><br>            <span style=\"color:#7a7e85;\">/* Add username to request */<br></span><span style=\"color:#7a7e85;\">            </span><span style=\"color:#9876aa;\">$request</span>[<span style=\"color:#6aab73;\">\'username\'</span>] = <span style=\"color:#9876aa;\">$this</span>-&gt;<span style=\"color:#57aaf7;\">getSlug</span>(<span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">name</span>);<br><br>            <span style=\"color:#7a7e85;\">/* Hash password and add token */<br></span><span style=\"color:#7a7e85;\">            </span><span style=\"color:#9876aa;\">$request</span>[<span style=\"color:#6aab73;\">\'password\'</span>] = Hash::<span style=\"color:#cf8e6d;\">make</span>(<span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">password</span>);<br>            <span style=\"color:#9876aa;\">$request</span>[<span style=\"color:#6aab73;\">\'api_token\'</span>] = <span style=\"color:#57aaf7;\">hash</span>(<span style=\"color:#6aab73;\">\'sha256\'</span>, <span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">email</span>. <span style=\"color:#6aab73;\">\'+\'</span>. <span style=\"color:#57aaf7;\">time</span>());<br>            <span style=\"color:#9876aa;\">$request</span>[<span style=\"color:#6aab73;\">\'birth_date\'</span>] = Carbon::<span style=\"color:#57aaf7;font-style:italic;\">parse</span>(<span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#c77dbb;\">birth_date</span>)-&gt;<span style=\"color:#57aaf7;\">format</span>(<span style=\"color:#6aab73;\">\'Y-m-d\'</span>);<br><br>            <span style=\"color:#7a7e85;\">/* When user is created, UserObserver is called and email was sent */<br></span><span style=\"color:#7a7e85;\">            /* Note: Data is logged into laravel.log */<br></span><span style=\"color:#7a7e85;\">            </span><span style=\"color:#9876aa;\">$user </span>= User::<span style=\"color:#57aaf7;font-style:italic;\">create</span>(<span style=\"color:#9876aa;\">$request</span>-&gt;<span style=\"color:#57aaf7;\">all</span>());<br><br>            <span style=\"color:#cf8e6d;\">if</span>(<span style=\"color:#9876aa;\">$user</span>) <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#9876aa;\">$this</span>-&gt;<span style=\"color:#57aaf7;\">jsonSuccess</span>(<span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Uspješno ste se kreirali korisnički račun!\'</span>), <span style=\"color:#57aaf7;\">route</span>(<span style=\"color:#6aab73;\">\'auth\'</span>));<br>        }<span style=\"color:#cf8e6d;\">catch </span>(<span style=\"color:#6f737a;\">\\</span>Exception <span style=\"color:#6f737a;\">$e</span>){<br>            <span style=\"color:#cf8e6d;\">return </span><span style=\"color:#9876aa;\">$this</span>-&gt;<span style=\"color:#57aaf7;\">jsonResponse</span>(<span style=\"color:#6aab73;\">\'1101\'</span>, <span style=\"color:#57aaf7;\">__</span>(<span style=\"color:#6aab73;\">\'Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!\'</span>));<br>        }<br>    }<br>}<br></pre></div></pre></div>', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
