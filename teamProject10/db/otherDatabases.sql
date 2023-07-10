CREATE TABLE
    `admin` (
        `id` int(11) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        PRIMARY KEY(id)
    );

CREATE TABLE
    `employee` (
        `id` int(11) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        PRIMARY KEY(id)
    );

-- --------------------------------------------------------

--

-- Table structure for table `customers`

--

CREATE TABLE
    `customers` (
        `id_customer` int(11) NOT NULL,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `phone` int(11) NOT NULL,
        `gender` varchar(255) NOT NULL,
        PRIMARY KEY(id_customer)
    );

-- --------------------------------------------------------

CREATE TABLE
 `contact_us` (
        `id` int(11) NOT NULL,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `subject` varchar(255) NOT NULL,
        `textarea` TEXT NOT NULL,
        PRIMARY KEY(id)
    );