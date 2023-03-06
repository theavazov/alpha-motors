import Link from "next/link";
import styles from "./location.module.css";
import "animate.css";

type Props = {
  title: string;
  location: string;
  parent?: { text: string; url: string };
};

export function Location({ title, location, parent }: Props) {
  return (
    <section className={styles.section}>
      <div className={`box ${styles.nav_inner}`}>
        <nav className={styles.nav_top}>
          <Link
            href={"/"}
            className={`${styles.nav_top_element} ${styles.nav_top_element_link}`}
          >
            Home
          </Link>
          <span className={styles.nav_top_element}>/</span>
          {parent ? (
            <>
              <Link
                href={parent.url}
                className={`${styles.nav_top_element} ${styles.nav_top_element_link}`}
              >
                {parent.text}
              </Link>
              <span className={styles.nav_top_element}>/</span>
            </>
          ) : null}
          <p className={styles.nav_top_element}>{location}</p>
        </nav>
        <p
          className={`animate__animated animate__fadeInLeft animate__delay-300ms ${styles.nav_title}`}
        >
          {title}
        </p>
      </div>
    </section>
  );
}
