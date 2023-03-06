import Image from "next/image";
import Link from "next/link";
import styles from "./header.module.css";
import logo from "../../public/media/logo_header.png";
import { useRouter } from "next/router";

export function Header() {
  const { pathname } = useRouter();

  return (
    <header className={styles.header}>
      <div className={`box ${styles.header_inner}`}>
        <Link href={"/"}>
          <Image src={logo} alt={"logo"} className={"logo"} />
        </Link>
        <nav className={styles.header_nav}>
          <Link
            href={"/vehicles"}
            className={
              pathname.includes("/vehicles")
                ? `${styles.nav_link} ${styles.active}`
                : styles.nav_link
            }
          >
            Vehicles
          </Link>
          <Link
            href={"/parts"}
            className={
              pathname.includes("/parts")
                ? `${styles.nav_link} ${styles.active}`
                : styles.nav_link
            }
          >
            Spare parts
          </Link>
          <Link
            href={"/about"}
            className={
              pathname === "/about"
                ? `${styles.nav_link} ${styles.active}`
                : styles.nav_link
            }
          >
            About
          </Link>
          <Link
            href={"/contacts"}
            className={
              pathname === "/contacts"
                ? `${styles.nav_link} ${styles.active}`
                : styles.nav_link
            }
          >
            Contacts
          </Link>
        </nav>
      </div>
    </header>
  );
}
