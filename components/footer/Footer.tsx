import styles from "./footer.module.css";
import logo from "../../public/media/logo_footer.png";
import Image from "next/image";
import Link from "next/link";

export function Footer() {
  return (
    <footer className={styles.footer}>
      <div className={`box ${styles.footer_inner}`}>
        <div>
          <Image src={logo} alt={"logo"} className="logo" />
          <div>
            <p className={styles.footer_nav_text}>
              Copyright &copy; {new Date().getFullYear()}
            </p>
            <p className={styles.footer_nav_text}>Alpha Motors</p>
          </div>
        </div>
        <div className={styles.footer_nav_container}>
          <p className={styles.footer_nav_title}>Menu</p>
          <nav className={styles.footer_nav_nav}>
            <Link href={"/about"} className={styles.footer_nav_text}>
              About company
            </Link>
            <Link href={"/vehicles"} className={styles.footer_nav_text}>
              Cars
            </Link>
            <Link href={"/parts"} className={styles.footer_nav_text}>
              Spare parts
            </Link>
            <Link href={"/"} className={styles.footer_nav_text}>
              Privacy policy
            </Link>
            <Link href={"/"} className={styles.footer_nav_text}>
              Terms of condition
            </Link>
          </nav>
        </div>
        <div className={styles.footer_nav_container}>
          <p className={styles.footer_nav_title}>Address</p>
        </div>
        <div className={styles.footer_nav_container}>
          <p className={styles.footer_nav_title}>Contacts</p>
        </div>
      </div>
    </footer>
  );
}
